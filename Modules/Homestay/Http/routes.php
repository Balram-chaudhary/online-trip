<?php

Route::group(['middleware' => 'web', 'prefix' => 'homestay', 'namespace' => 'Modules\Homestay\Http\Controllers'], function()
{
    Route::any('/create', 'HomestayController@create')->name('homestay.create');
    Route::get('/list', 'HomestayController@list')->name('homestay.list');
    Route::any('/edit/{id}', 'HomestayController@edit')->name('homestay.edit');
    Route::get('/remove/{id}', 'HomestayController@remove')->name('homestay.remove');
    Route::get('/search','HomestayController@search')->name('homestay.search');
    Route::post('/sort','HomestayController@sort')->name('homestay.sort');
   
   
});
