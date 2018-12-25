<?php

$namespace = "ARJUN\ADMIN\CONTROLLERS";

Route::group(['prefix' => 'password', 'middleware' => 'web', 'namespace' => $namespace], function () {
    Route::get('setpassword/{email}/{token}', 'USERSCONTROLLER@setpassword');
    Route::post('setpassword', 'USERSCONTROLLER@PostSetPassword');
});

Route::group(['prefix' => 'admin', 'middleware' => 'web', 'namespace' => $namespace], function () {
    Route::get('/', 'ADMINCONTROLLER@login');
    Route::get('login', 'AUTH\LOGINCONTROLLER@showLoginForm');
    Route::post('login', 'AUTH\LOGINCONTROLLER@login');
});
Route::group(['prefix' => 'admin', 'middleware' => ['web'], 'namespace' => $namespace], function () {
    Route::get('dashboard', 'ADMINCONTROLLER@showDasbboard');
    Route::get('logout', 'ADMINCONTROLLER@logout');
});
Route::group(['prefix' => 'admin/acl', 'middleware' => ['web'], 'namespace' => $namespace . '\ACL'], function () {
    Route::get('/', 'ACLCONTROLLER@index');
//    Roles Controlles
    Route::get('roles/{id?}', 'ROLESCONTROLLER@index');
    Route::post('role/post', 'ROLESCONTROLLER@create');

//    Permissions Controlles
    Route::get('permissions/{id?}', 'PERMISSIONCONTROLLER@index');
    Route::post('permission/post', 'PERMISSIONCONTROLLER@create');

//    Role Permissions Controlles
    Route::get('rolematrix', 'ACLCONTROLLER@rolematrix');
    Route::get('permissionmatrix', 'ACLCONTROLLER@permissionmatrix');
    Route::get('usermatrix', 'ACLCONTROLLER@usermatrix');
    Route::post('rolematrix/post', 'ACLCONTROLLER@postrolematrix');
});
Route::group(['prefix' => 'admin/settings', 'middleware' => ['web'], 'namespace' => $namespace . '\SETTINGS'], function () {
    Route::get('/', 'SETTINGSCONTROLLER@index');
});
Route::group(['prefix' => 'admin/users', 'middleware' => ['web'], 'namespace' => $namespace], function () {
    Route::get('/', 'USERSCONTROLLER@index');
    Route::get('add', 'USERSCONTROLLER@action');
    Route::get('show/{id}', 'USERSCONTROLLER@action');
    Route::get('edit/{id}', 'USERSCONTROLLER@action');
    Route::get('delete', 'USERSCONTROLLER@action');
    Route::post('action/{id?}', 'USERSCONTROLLER@addupdate');
    Route::get('notify', 'USERSCONTROLLER@testnotification');
});
