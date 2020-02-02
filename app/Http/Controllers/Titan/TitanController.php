<?php

namespace App\Http\Controllers\Titan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Carbon\Carbon;

use App\Models\Heroine;
use App\Models\Logging;

class TitanController extends Controller
{
    public function __construct() {}

    public function index(Request $request)
    {
        $pw = env("UPLOAD_PW");
        $submitted = (string) $request->input('waifu');

        $logs     = Logging::all();
        $heroines = Heroine::with('logs')->get();

        $heroines = $heroines->each(function ($heroine) {
            $heroine->current_level      = $heroine->logs->max('new_level');
            $heroine->promotion_received = $heroine->logs->max('promotion_received');
        });

        return ($submitted === $pw)
            ? view('titan.index')->with([
                'logs' => $logs,
                'heroines' => $heroines,
            ])
            : view('index');
    }

    /** post a log entry */
    public function storeLog(Request $request)
    {
        $now = Carbon::now();
        $pw = env("UPLOAD_PW");
        $submitted = (string) $request->input('waifu');

        if ($submitted === $pw) {
            $attributes = array_merge($request->only(['new_level', 'heroine_id']), ['promoted' => true, 'promotion_received' => $now]);

            $encoded = json_encode($attributes);
            \Log::info("Creating log entry: $encoded");

            Logging::create($attributes);

            return redirect()->route('titan_index',['waifu' => $submitted])->with('success','Logged.');
        }

        return view('index');
    }

    /** post a Heroine entry */
    public function storeHeroine(Request $request)
    {
        $pw = env("UPLOAD_PW");
        $submitted = (string) $request->input('waifu');

        if ($submitted === $pw) {
            $attributes = $request->only(['link_to_picture', 'name', 'discription', 'attack_type']);

            $encoded = json_encode($attributes);
            \Log::info("Creating heroine entry: $encoded");

            Heroine::create($attributes);

            return redirect()->route('titan_index',['waifu' => $submitted])->with('success','Registered.');
        }

        return view('index');
    }
}
