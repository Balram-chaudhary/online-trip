<?php

Route::group(['middleware' => 'web', 'prefix' => 'admin', 'namespace' => 'Modules\Admin\Http\Controllers'], function()
{
    Route::get('/our_secret_trip', 'AdminController@index')->name('admin.login');
    Route::post('/authenticate','AdminController@authenticate')->name('admin.login.submit');
    Route::get('/dashboard','AdminController@dashboard')->name('admin.dashboard');
    Route::get('/dashboard/logout','AdminController@logout')->name('admin.dashboard.logout');
  
});
