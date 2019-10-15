<?php

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

// Auth::routes();

// reset password
Route::group(['prefix' => 'password', 'as' => 'password.'], function () {
  Route::get('/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('request');
  Route::post('/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('email');
  Route::get('/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('reset');
  Route::post('/reset', 'Auth\ResetPasswordController@reset')->name('update');
});

Route::group(['prefix' => 'admin', 'middleware' => ['guest', 'active-user']], function () {
  // dashboard
  Route::group(['prefix' => '/', 'as' => 'dashboard.'], function () {
    Route::get('/', 'DashboardController@index')->middleware('permission:read-dashboard')->name('index');
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
  });

  // users
  Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
    Route::get('/', 'UserController@index')->middleware('permission:read-user')->name('index');
    Route::get('/create', 'UserController@create')->middleware('permission:create-user')->name('create');
    Route::post('/', 'UserController@store')->middleware('permission:create-user')->name('store');
    Route::get('/{id}/edit', 'UserController@edit')->middleware('permission:update-user')->name('edit');
    Route::put('/{id}', 'UserController@update')->middleware('permission:update-user')->name('update');
    Route::delete('/{id}', 'UserController@destroy')->middleware('permission:delete-user')->name('destroy');
  });

  // roles
  Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
    Route::get('/', 'RoleController@index')->middleware('permission:read-role')->name('index');
    Route::get('/create', 'RoleController@create')->middleware('permission:create-role')->name('create');
    Route::post('/', 'RoleController@store')->middleware('permission:create-role')->name('store');
    Route::get('/{id}/edit', 'RoleController@edit')->middleware('permission:update-role')->name('edit');
    Route::put('/{id}', 'RoleController@update')->middleware('permission:update-role')->name('update');
    Route::delete('/{id}', 'RoleController@destroy')->middleware('permission:delete-role')->name('destroy');
  });

  // permission
  Route::group(['prefix' => 'permissions', 'as' => 'permissions.'], function () {
    Route::get('/', 'PermissionController@index')->middleware('permission:read-permission')->name('index');
    Route::post('/{id}', 'PermissionController@saveRolePermission')->middleware('permission:update-permission')->name('save');
  });

  // departments
  Route::group(['prefix' => 'departments', 'as' => 'departments.'], function () {
    Route::get('/', 'DepartmentController@index')->middleware('permission:read-department')->name('index');
    Route::get('/create', 'DepartmentController@create')->middleware('permission:create-department')->name('create');
    Route::post('/', 'DepartmentController@store')->middleware('permission:create-department')->name('store');
    Route::get('/{id}/edit', 'DepartmentController@edit')->middleware('permission:update-department')->name('edit');
    Route::put('/{id}', 'DepartmentController@update')->middleware('permission:update-department')->name('update');
    Route::delete('/{id}', 'DepartmentController@destroy')->middleware('permission:update-department')->name('destroy');
  });

  // workers
  Route::group(['prefix' => 'workers', 'as' => 'workers.'], function () {
    Route::get('/', 'WorkerController@index')->middleware('permission:read-worker')->name('index');
    Route::get('/create', 'WorkerController@create')->middleware('permission:create-worker')->name('create');
    Route::post('/', 'WorkerController@store')->middleware('permission:create-worker')->name('store');
    Route::get('/{id}/edit', 'WorkerController@edit')->middleware('permission:update-worker')->name('edit');
    Route::put('/{id}', 'WorkerController@update')->middleware('permission:update-worker')->name('update');
    Route::delete('/{id}', 'WorkerController@destroy')->middleware('permission:delete-worker')->name('destroy');
    Route::get('/{id}', 'WorkerController@show')->middleware('permission:read-worker')->name('show');
  });

  //contract
  Route::group(['prefix' => 'contracts', 'as' => 'contracts.'], function () {
    Route::post('/', 'ContractController@store')->middleware('permission:create-contract')->name('store');
    Route::get('/{id}/edit', 'ContractController@edit')->middleware('permission:update-contract')->name('edit');
    Route::put('/update', 'ContractController@update')->middleware('permission:update-contract')->name('update');
    Route::delete('/{id}', 'ContractController@destroy')->middleware('permission:delete-contract')->name('destroy');
    Route::get('/reload/{id}', 'ContractController@reloadData')->middleware('permission:read-contract')->name('reload');;
    Route::get('/document/{id}', 'ContractController@document')->middleware('permission:read-contract')->name('document');
  });

  //decision
  Route::group(['prefix' => 'decisions', 'as' => 'decisions.'], function () {
    Route::get('/', 'DecisionController@create')->middleware('permission:create-decision')->name('create');
    Route::post('/', 'DecisionController@store')->middleware('permission:create-decision')->name('store');
    Route::get('/{id}/edit', 'DecisionController@edit')->middleware('permission:update-decision')->name('edit');
    Route::put('/update', 'DecisionController@update')->middleware('permission:update-decision')->name('update');
    Route::delete('/{id}', 'DecisionController@destroy')->middleware('permission:delete-decision')->name('destroy');
    Route::get('/reload/{id}', 'DecisionController@reloadData')->middleware('permission:read-decision')->name('reload');;
    Route::get('/document/{id}', 'DecisionController@document')->middleware('permission:read-decision')->name('document');
  });

  // profile
  Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
    Route::get('/', 'ProfileController@index')->name('index');
    Route::put('/update-profile/{id}', 'ProfileController@updateProfile')->name('updateProfile');
    Route::put('/update-password/{id}', 'ProfileController@updatePassword')->name('updatePassword');
    Route::post('/avatar/{id}', 'ProfileController@uploadAvatar')->name('uploadAvatar');
  });
});
