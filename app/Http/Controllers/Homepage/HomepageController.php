<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Jobs\Homepage\RssCheckJob;

class HomepageController extends Controller
{
    /**
    * Handles the pre launch tasls
    */
    public function launch()
    {
        $this->dispatch((new RssCheckJob)->onQueue('homepage'));

        return view('index');
    }
}
