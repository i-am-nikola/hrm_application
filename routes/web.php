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

Route::group(['prefix' => 'admin', 'middleware' => ['guest', 'active-user']], function () {
  // dashboard
  Route::get('/', 'DashboardController@index')->name('dashboard');

  // users
  Route::resource('users', 'UserController');

  // roles
  Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
    Route::get('/', 'RoleController@index')->name('index');
    Route::get('/create', 'RoleController@create')->name('create');
    Route::post('/', 'RoleController@store')->name('store');
    Route::get('/{id}/edit', 'RoleController@edit')->name('edit');
    Route::put('/{id}', 'RoleController@update')->name('update');
    Route::delete('/{id}', 'RoleController@destroy')->name('destroy');
  });

  // permission
  Route::group(['prefix' => 'permissions', 'as' => 'permissions.'], function () {
    Route::get('/', 'PermissionController@index')->name('index');
    Route::post('/{id}', 'PermissionController@saveRolePermission')->name('save');
  });

  // departments
  Route::group(['prefix' => 'departments', 'as' => 'departments.'], function () {
    Route::get('/', 'DepartmentController@index')->name('index');
    Route::get('/create', 'DepartmentController@create')->name('create');
    Route::post('/', 'DepartmentController@store')->name('store');
    Route::get('/{id}/edit', 'DepartmentController@edit')->name('edit');
    Route::put('/{id}', 'DepartmentController@update')->name('update');
    Route::delete('/{id}', 'DepartmentController@destroy')->name('destroy');
  });

  // workers
  Route::resource('workers', 'WorkerController');

  //contract
  Route::group(['prefix' => 'contracts', 'as' => 'contracts.'], function () {
    Route::post('/', 'ContractController@store')->name('store');
    Route::get('/{id}/edit', 'ContractController@edit')->name('edit');
    Route::put('/update', 'ContractController@update')->name('update');
    Route::delete('/{id}', 'ContractController@destroy')->name('destroy');
    Route::get('/reload/{id}', 'ContractController@reloadData')->name('reload');;
  });

  //decision
  Route::group(['prefix' => 'decisions', 'as' => 'decisions.'], function () {
    Route::get('/', 'DecisionController@create')->name('create');
    Route::post('/', 'DecisionController@store')->name('store');
    Route::get('/{id}/edit', 'DecisionController@edit')->name('edit');
    Route::put('/update', 'DecisionController@update')->name('update');
    Route::delete('/{id}', 'DecisionController@destroy')->name('destroy');
    Route::get('/reload/{id}', 'DecisionController@reloadData')->name('reload');;
  });
});
