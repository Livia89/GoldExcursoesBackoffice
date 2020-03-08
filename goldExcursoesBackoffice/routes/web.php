<?php

use Illuminate\Http\Resources\Json\Resource;

 Route::get('/', function () {
     return redirect()->route('login');
 });

Auth::routes(); 

Route::get('/home', 'HomeController@index')->name('home');



Route::resource('clients', 'Admin\ClientController');
Route::resource('tour', 'Admin\TourController');


