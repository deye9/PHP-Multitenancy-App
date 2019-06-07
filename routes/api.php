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

Route::post('/registeruser', [
    'uses' => 'AuthController@register',
]);

Route::post('/signin',  [
    'uses' => 'AuthController@signin',
]);

Route::post('/base64upload', 'ValidateController@base64upload')->name('base64upload');

Route::group(['middleware' => 'tenancy.enforce'], function () {

    Route::get('/queries',  [
        'uses' => 'GraphQLController@Queries',
    ]);

    Route::post('/mutations',  [
        'uses' => 'GraphQLController@Mutations',
    ]);

    Route::post('/subscriptions',  [
        'uses' => 'GraphQLController@Subscriptions',
    ]);

    Route::post('/forgotpassword',  [
        'uses' => 'AuthController@forgotpassword',
    ]);

    Route::post('/resetpassword', [
        'uses' => 'AuthController@resetpassword',
    ]);
});

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/user', [
        'uses' => 'AuthController@vettoken',
    ]);
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
