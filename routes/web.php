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

Route::get('foo', function () {
   
    return view('welcome');
    Route::resource('users', 'Admin\UsersController');
});




	Route::resource('photos', 'PhotoController');


	Route::prefix('admin')->group(function () {
    Route::resource('user', 'Admin\UsersController');
    Route::get('demoone', 'DemoController@index');
   
    


});
Route::get('login', 'LoginController@index')->name('login');

    Route::get('logout', 'LoginController@logout');
	Route::post('login', 'LoginController@authenticate');