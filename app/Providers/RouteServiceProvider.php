<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;

class RouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Route::middleware('web')->get('/', HomepageController::class . '@launch')->name('homepage');
        Route::get('random', HomepageController::class . '@getRandomFile')->name('getFile');
        Route::get('upload', HomepageController::class . '@uploadfileview')->name('upload_background_view');
        Route::post('upload', HomepageController::class . '@uploadFile')->name('upload_background_post');
    }
}
