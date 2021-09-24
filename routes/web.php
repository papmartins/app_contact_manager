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
// authenticate defined in \app\html\kernel.php
Route::middleware('authenticate')->group( function () { 
    Route::get('/edit/{id}/{msg?}','ContactController@edit')->name("site.edit");
    Route::get('/new','ContactController@create')->name("site.new");
    Route::get('/show/{id}','ContactController@show')->name("site.show");
    Route::put('/update/{id}','ContactController@update')->name("site.update");
    Route::post('/store','ContactController@store')->name("site.store");
    Route::delete('/destroy/{id}','ContactController@destroy')->name("site.destroy");
    Route::get('/logout', 'LoginController@exit')->name("site.logout");
});

Route::get('/','ContactController@index')->name("site.index");
Route::get('/login/{error?}', 'LoginController@index')->name("site.login"); // parametro opcional(?) login/{erro?} 
Route::post('/login', 'LoginController@authenticate')->name("site.login");
