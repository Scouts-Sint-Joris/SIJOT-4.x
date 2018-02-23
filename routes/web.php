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

Auth::routes();

// Frontend
Route::get('/', 'Frontend\DefaultController@index');
Route::get('/disclaimer', 'Frontend\DisclaimerController@index')->name('disclaimer.index');

// Frontend - Leases 
Route::get('verhuur', 'Frontend\LeaseController@index')->name('verhuur.index');
Route::get('verhuur/aanvragen', 'Frontend\LeaseController@create')->name('verhuur.create');
Route::post('verhuur/aanvragen', 'Frontend\LeaseController@store')->name('verhuur.store');

// Backend
Route::get('/home', 'HomeController@index')->name('home');

// TODO: Implementatie 'forbid-banned-middleware'
Route::prefix('/admin')->group(function () {
    Route::resource('nieuws', 'Backend\ArticleController');
    Route::resource('gebruikers', 'Backend\UserController');
    Route::resource('restrictie', 'Backend\BlockController');
    Route::resource('lease', 'Backend\Lease\LeaseController');
});
