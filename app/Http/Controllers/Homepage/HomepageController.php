<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Jobs\Homepage\RssCheckJob;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Services\Image;

class HomepageController extends Controller
{
    protected $image;

    public function __construct()
    {
        $this->image = new Image;
    }

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

        $fileName = "bgn".time().'.'.request()->fileToUpload->getClientOriginalExtension();

        $request->fileToUpload->storeAs('img', $fileName, 'img');

        return back()
            ->with('success','You have successfully upload image.');

    }

    public function getRandomFile()
    {
        $path  = $this->image->getPublicPath();
        $files = $this->image->blacklistFiles(collect(scandir($path)));
        $file  = $this->image->recursiveRadomSelection($files);

        return $file;
    }
}
