<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Jobs\Homepage\SymphonicMetalCheckJob;

class HomepageController extends Controller
{
    /**
    * Handles the pre launch tasls
    */
    public function launch()
    {
        $this->dispatch((new SymphonicMetalCheckJob)->onQueue('homepage'));

        return view('index');
    }
}
