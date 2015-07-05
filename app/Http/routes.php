<?php

Route::get('/', [
    'as' => 'dashboard',
    'uses' => 'DashboardController@index'
]);


//Authentication
Route::get('auth/login', [
    'as' => 'auth.login',
    'uses' => 'Auth\AuthController@getLogin'
]);

Route::post('auth/login', [
    'as' => 'auth.login',
    'uses' => 'Auth\AuthController@postLogin'
]);

Route::get('auth/logout', [
    'as' => 'auth.logout',
    'uses' => 'Auth\AuthController@getLogout'
]);

//User Registration
Route::get('auth/register', [
    'as' => 'auth.register',
    'uses' => 'Auth\AuthController@getRegister'
]);

Route::post('auth/register', [
    'as' => 'auth.register',
    'uses' => 'Auth\AuthController@postRegister'
]);

//Password reset
Route::get('password/email', [
    'as' => 'password.reset',
    'uses' => 'Auth\PasswordController@getEmail'
]);

Route::post('password/email', [
    'as' => 'password.reset',
    'uses' => 'Auth\PasswordController@postEmail'
]);

Route::get('password/reset/{token}', [
    'as' => 'password.reset.token',
    'uses' => 'Auth\PasswordController@getReset'
]);

Route::post('password/reset', [
    'as' => 'password.reset.token',
    'uses' => 'Auth\PasswordController@postReset'
]);
