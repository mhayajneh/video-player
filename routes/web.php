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

Route::get('/', 'WelcomePageController@index')->name('welcomePage');

Auth::routes();

Route::get('/admin/login','Auth\LoginController@showLoginForm');

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('library')->group(function () {
    Route::prefix('videos')->group(function () {
        Route::get('/','VideosController@videosList')->name('videos');
        Route::get('/{videoID}','VideosController@videoDetails')->name('videoDetails');

    });
});

route::get('/search','VideosController@search')->name('search');


Route::prefix('admin')->group(function () {
    Route::get('/dashboard/','admin\DashboardController@index')->name('adminPanel');
    Route::resource('users','admin\UsersController');
    Route::resource('videos','admin\VideosController');
});
