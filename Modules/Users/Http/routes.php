<?php

Route::group(['middleware' => 'web', 'prefix' => 'users', 'namespace' => 'Modules\Users\Http\Controllers'], function()
{
    Route::get('/login', 'UsersController@index')->name('login.users');
    Route::post('/login', 'UsersController@authenticate')->name('users.login.submit');
    Route::get('/dashboard', 'UsersController@dashboard')->name('users.dashboard');

});
