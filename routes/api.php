<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'tenant'], function() {
    Route::post('/register', 'ValidateController@register')->name('register');
    Route::get('/isavailable/{name}', 'ValidateController@isavailable')->name('isavailable');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
