<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});
Route::get('/test', function () {
    return view('test_view');
});


Auth::routes(['verify' => true]);
Auth::routes();


Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/accueil','AdsController@showAll');
Route::get('/add_ads', 'AdsController@addAds');
Route::post('/add_ads', 'AdsController@createAds')->name('new_ad');
Route::get('/ads','AdsController@getAds');
Route::get('/info_ad/{id}','AdsController@adDetails');
Route::get('/update_ad/{id}','AdsController@editAds');
Route::post('/update_ad', 'AdsController@updateAds')->name('update_ad');
Route::get('/delete_ad/{id}','AdsController@deleteAds');

Route::get('/users','UserController@getUsers');
Route::get('/update_user/{id}','UserController@editUsers');
Route::post('/update_user', 'UserController@updateUsers')->name('update_user');
Route::get('/delete_user/{id}','UserController@deleteUsers');