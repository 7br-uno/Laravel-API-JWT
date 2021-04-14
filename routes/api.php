<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Authentication needed
Route::middleware(['api.JWT'])->namespace('api')->group(function(){

    Route::prefix('auth')->group(function (){
        Route::post('logout', 'AuthController@logout');
        Route::get('me', 'AuthController@me');        
    });

    Route::prefix('users')->group(function (){
        Route::get('', 'UserController@read');
    });

});

//No Authentication Needed
Route::namespace('api')->group(function(){

    Route::prefix('auth')->group(function (){
        Route::post('login', 'AuthController@login');
    });

    Route::prefix('users')->group(function (){
        Route::post('register', 'UserController@create');
    });

});