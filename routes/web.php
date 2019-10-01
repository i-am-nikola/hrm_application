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
  return redirect()->route('login');
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

  //conotract
  // Route::resource('contracts', 'ContractController');
  Route::group(['prefix' => 'contracts', 'as' => 'contracts.'], function () {
    Route::get('/', 'ContractController@index')->name('index');
    Route::post('/', 'ContractController@store')->name('store');
    Route::get('/{id}/edit', 'ContractController@edit')->name('edit');
    Route::put('/update', 'ContractController@update')->name('update');
    Route::delete('/{id}', 'ContractController@destroy')->name('destroy');
    Route::get('/reload/{id}', 'ContractController@reloadData')->name('reload');
  });
});
