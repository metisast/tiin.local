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

Route::group(['middleware' => ['web', 'localeSessionRedirect', 'localizationRedirect'], 'prefix' => LaravelLocalization::setLocale()], function () {

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

Route::group(['middleware' => ['web', 'localeSessionRedirect', 'localizationRedirect'], 'prefix' => LaravelLocalization::setLocale()], function () {

    /*
    |--------------------------------------------------------------------------
    | Auth routes group
    |--------------------------------------------------------------------------
    |larave
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
        /* User home page */
        Route::get('/', ['as' => 'index', 'uses' => 'UserController@index']);

        /*User show profile*/
        Route::get('/user', ['as' => 'user', 'uses' => 'UserController@profile']);

        /*User edit profile*/
        Route::post('/user', ['as' => 'editProfile', 'uses' => 'UserController@editProfile']);

        /*User products*/
        Route::resource('products', 'ProductsController');

        /* Auction create */
        Route::get('/auction/create', ['as' => 'auctionCreate', 'uses' => 'AuctionController@create']);

        /* Auction store */
        Route::post('/auction', ['as' => 'auctionStore', 'uses' => 'AuctionController@store']);
    });

    /*
    |--------------------------------------------------------------------------
    | XMLHttpRequest routes group
    |--------------------------------------------------------------------------
    |
    */
    Route::group([
        'namespace' => 'Xhr',
        'as' => 'xhr::',
        'prefix' => 'xhr'
    ], function(){
        /* Get cities by region*/
        Route::post('/cities', ['as' => 'cities', 'uses' => 'Xhr@getCities']);

        /* Get sub categories by main category*/
        Route::post('/subcat', ['as' => 'subcat', 'uses' => 'Xhr@getCategories']);

        /* Set user photo */
        Route::post('/photo', ['as' => 'photo', 'uses' => 'Xhr@photo']);

        /* Set product images */
        Route::post('/product-images', ['as' => 'productImages', 'uses' => 'Xhr@productImages']);

        /* Delete product images */
        Route::post('/product-images/delete', ['as' => 'productImagesDelete', 'uses' => 'Xhr@productImagesDelete']);

        /* Error message */
        Route::post('/messages/error', ['as' => 'messagesError', 'uses' => 'Xhr@messagesError']);

        /* Success message */
        Route::post('/messages/success', ['as' => 'messagesSuccess', 'uses' => 'Xhr@messagesSuccess']);

        /* Get auction up/down form */
        Route::post('/auction-price-form', ['as' => 'auctionUpForm', 'uses' => 'Xhr@auctionPriceForm']);

    });

});
