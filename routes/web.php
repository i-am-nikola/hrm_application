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

Route::get('/', function () {
  return redirect()->route('dashboard');
});

// logout
Route::get('logout', 'LoginController@logout')->name('logout');

// login
Route::group(['prefix' => 'login'], function () {
  Route::get('/', 'LoginController@index')->name('login');
  Route::post('/', 'LoginController@authenticate')->name('authenticate');
});

Route::group(['prefix' => 'admin', 'middleware' => 'guest'], function () {
  // dashboard
  Route::get('/', 'DashboardController@index')->name('dashboard');

  // users
  Route::resource('users', 'UserController');

  // workers
  Route::resource('workers', 'WorkerController');
});
