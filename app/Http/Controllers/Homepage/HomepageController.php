<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Jobs\Homepage\RssCheckJob;
use Illuminate\Http\Request;

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

    /** Return view to upload file */
    public function uploadFileview()
    {
        return view('upload.file_upload');
    }

    /** Example of File Upload */
    public function uploadFile(Request $request){
        $request->validate([
            'fileToUpload' => 'required|file',
        ]);

        $fileName = "image".time().'.'.request()->fileToUpload->getClientOriginalExtension();

        $request->fileToUpload->storeAs('img', $fileName, 'img');

        return back()
            ->with('success','You have successfully upload image.');

    }
}
