<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use MarkDingemanse\Beyondlove\Services\Image;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    protected $image;

    public function __construct()
    {
        $this->image = new Image;
    }

    /**
    * Handles the pre launch tasks
    */
    public function launch()
    {
        return view('index');
    }

    /** Return view to upload file */
    public function uploadFileview(Request $request)
    {
        $pw = env("UPLOAD_PW");
        $submitted = (string) $request->input('waifu');

        return ($submitted === $pw)?
            view('upload.file_upload'):
            view('index');
    }


    /** Example of File Upload */
    public function uploadFile(Request $request){
        $pw = env("UPLOAD_PW");
        $submitted = (string) $request->input('waifu');

        if ($submitted === $pw) {
            $request->validate([
                'file' => 'required|file',
            ]);

            $fileName = "bgn".time().'.'.request()->file->getClientOriginalExtension();

            $request->file('file')->store($fileName);

            return redirect()->route('upload_background_view',['waifu' => $submitted]);
        }

        return view('index');
    }

    public function getRandomFile()
    {
        $path  = $this->image->getPublicPath();
        $files = $this->image->blacklistFiles(collect(scandir($path)));
        $file  = $this->image->recursiveRadomSelection($files);

        return $file;
    }
}
