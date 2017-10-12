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


Route::group(['middleware'=>'web'],function(){

    Route::get('/', function () {
        return view('welcome');
    });

    Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {

    });

    Route::group(['prefix' => 'owner', 'middleware' => ['role:owner']], function() {

    });

    Route::get('/home', 'HomeController@index')->name('home');


    Route::get('/token-mismatch', function () {
        return view('errors.tokenMismatch');
    });

    Auth::routes();
});


