<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

});

Route::get('/', 'Homepage\HomepageController@launch')->name('homepage');

Route::get('uploadfile','Homepage\HomepageController@uploadfileview')->name('upload_background_view');

Route::post('uploadfile','Homepage\HomepageController@uploadFile')->name('upload_background_post');;
