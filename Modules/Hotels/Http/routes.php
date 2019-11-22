<?php

Route::group(['middleware' => 'web', 'prefix' => 'hotels', 'namespace' => 'Modules\Hotels\Http\Controllers'], function()
{
    Route::get('/admin', 'HotelsController@index')->name('hotels.login');
    Route::post('/admin/authenticate','HotelsController@authenticate')->name('hotels.login.submit');
    Route::get('/dashboard','HotelsController@dashboard')->name('hotels.dashboard');
    Route::get('/dashboard/logout','HotelsController@logout')->name('hotels.dashboard.logout');
    Route::post('/propertydetail','HotelsController@propertydetail')->name('hotels.propertydetail');
    Route::get('/propertydetaillist/{hid}/{rid}','HotelsController@propertydetailist')->name('hotels.propertydetailist');
});
