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

// Frontend - Policies
Route::get('/disclaimer', 'Frontend\DisclaimerController@index')->name('disclaimer.index');
Route::get('privacy', 'Frontend\DisclaimerController@privacyStatement')->name('disclaimer.privacy');

// Frontend - Groups 
Route::get('/takken', 'Frontend\GroupController@index')->name('takken.index');
Route::get('/takken/{slug}', 'Frontend\GroupController@show')->name('takken.show');

// Frontend - Leases 
Route::get('verhuur', 'Frontend\LeaseController@index')->name('verhuur.index');
Route::get('verhuur/aanvragen', 'Frontend\LeaseController@create')->name('verhuur.create');
Route::post('verhuur/aanvragen', 'Shared\LeaseController@store')->name('verhuur.store');

// Backend
Route::get('/home', 'HomeController@index')->name('home');

// TODO: Implementatie 'forbid-banned-middleware'
Route::prefix('/admin')->group(function () {
    Route::resource('groups', 'Backend\GroupController');
    Route::resource('nieuws', 'Backend\ArticleController');
    Route::resource('gebruikers', 'Backend\UserController');
    Route::resource('restrictie', 'Backend\BlockController');
    Route::resource('lease', 'Backend\Lease\LeaseController');
});
