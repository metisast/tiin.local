<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::group([
        'namespace' => 'Guest',
        'as' => 'guest::'
    ], function(){
        Route::get('/', [
            'as' => 'index',
            'uses' => 'GuestController@index'
        ]);
    });

});
Route::group(['middleware' => 'web'], function () {

    /*
    |--------------------------------------------------------------------------
    | Auth routes group
    |--------------------------------------------------------------------------
    |
    */
    Route::auth();

    /*
    |--------------------------------------------------------------------------
    | Admin routes group
    |--------------------------------------------------------------------------
    |
    */
    Route::group([
        'namespace' => 'Admin',
        'middleware' => 'auth.admin',
        'as' => 'admin::',
        'prefix' => 'admin'
    ], function(){
        /* Admin home page */
        Route::get('/', [
            'as' => 'index',
            'uses' => 'AdminController@index'
        ]);
    });

    /*
    |--------------------------------------------------------------------------
    | Moder routes group
    |--------------------------------------------------------------------------
    |
    */
    Route::group([
        'namespace' => 'Moder',
        'middleware' => 'auth.moder',
        'as' => 'moder::',
        'prefix' => 'moder'
    ], function(){
        /* Moder home page */
        Route::get('/', [
            'as' => 'index',
            'uses' => 'ModerController@index'
        ]);
    });

    /*
    |--------------------------------------------------------------------------
    | User routes group
    |--------------------------------------------------------------------------
    |
    */
    Route::group([
        'namespace' => 'User',
        'middleware' => 'auth.user',
        'as' => 'user::',
        'prefix' => 'profile'
    ], function(){
        /* Admin home page */
        Route::get('/', [
            'as' => 'index',
            'uses' => 'UserController@index'
        ]);
    });

});
