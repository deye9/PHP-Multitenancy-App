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

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    $url = env('APP_URL', '');

    if (Request::fullUrl() == $url) {
        // We are on a correct route!
        return view('welcome', [
            'title' => env('APP_NAME'),
            'url' => env('APP_URL_BASE'),
            'catchphase' => env('CATCH_PHASE')
        ]);
    }
    return App::call('App\Http\Controllers\Tenants\DefaultController@index');
});

Route::get('/home', function () {
    $url = env('APP_URL', '');

    if (Request::fullUrl() == $url) {
        // We are on a correct route!
        return view('default', [
            'title' => env('APP_NAME'),
            'url' => env('APP_URL_BASE'),
            'catchphase' => env('CATCH_PHASE')
        ]);
    }

    return App::call('App\Http\Controllers\Tenants\DefaultController@home');
})->name('home');
