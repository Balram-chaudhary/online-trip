<?php

Route::group(['middleware' => 'web', 'prefix' => 'login', 'namespace' => 'Modules\Login\Http\Controllers'], function()
{
    Route::get('/', 'LoginController@index')->name('login');
    Route::post('/','LoginController@authenticate')->name('login.submit');
    Route::get('/logout','LoginController@logout')->name('login.logout')->middleware('auth');
});
