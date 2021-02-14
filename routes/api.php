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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login/{v}', [ 'as' => 'login', 'uses' => 'AuthController@login'])->middleware('checkguest');
    Route::post('logout/{v}', 'AuthController@logout');
    Route::post('refresh/{v}', 'AuthController@refresh');
    Route::post('me/{v}', 'AuthController@me');
    Route::post('register/{v}' , [ 'as' => 'register', 'uses' => 'AuthController@register'])->middleware('checkguest');
});

Route::get('/invalid/{v}', [ 'as' => 'invalid', 'uses' => 'AuthController@invalid']);


// users apis group
Route::group([
    'middleware' => 'api',
    'prefix' => 'user'
], function($router) {
    Route::get('profile/{v}' , 'UserController@getprofile');
    Route::put('profile/{v}' , 'UserController@updateprofile');
    Route::put('resetpassword/{v}' , 'UserController@resetpassword');
    Route::put('resetforgettenpassword/{v}' , 'UserController@resetforgettenpassword')->middleware('checkguest');
    Route::post('checkphoneexistance/{v}' , 'UserController@checkphoneexistance')->middleware('checkguest');
    Route::get('notifications/{v}' , 'UserController@notifications');
});

Route::get('/ads/{v}' , 'HomeController@GetAds')->middleware('checkguest');
Route::get('/home/{v}' , 'HomeController@GetHome')->middleware('checkguest');
Route::get('/banks/{v}' , 'BankController@GetBanks')->middleware('checkguest');
Route::get('/contact_us/{v}' , 'ContactUsController@GetContact')->middleware('checkguest');
Route::get('/categories/{v}' , 'DonationController@GetCategories')->middleware('checkguest');

// services apis group
Route::group([
    'middleware' => 'api',
    'prefix' => 'services'
], function($router) {
    Route::get('{v}' , 'ServiceController@GetServices')->middleware('checkguest');
});

// news apis group
Route::group([
    'middleware' => 'api',
    'prefix' => 'news'
], function($router) {
    Route::get('{v}' , 'NewsController@GetNews')->middleware('checkguest');
});

// products apis group
Route::group([
    'middleware' => 'api',
    'prefix' => 'products'
], function($router) {
    Route::get('{v}' , 'ProductController@GetProducts')->middleware('checkguest');
    Route::get('{id}/{v}' , 'ProductController@ProductDetails')->middleware('checkguest');
    Route::post('request/{v}' , 'ProductController@Request')->middleware('checkguest');
});

Route::group([
      'middleware' => "api",
      "prefix" => "donations"  
], function($router){
    Route::get('{v}' , 'DonationController@GetDonations');
    Route::post('{v}' , 'DonationController@PostDonations');
	Route::post('image/{v}' , 'DonationController@PostImage');
    Route::get('details/{id}/{v}' , 'DonationController@Details');    
});





