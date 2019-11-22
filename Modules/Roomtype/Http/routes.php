<?php

Route::group(['middleware' => 'web', 'prefix' => 'roomtype', 'namespace' => 'Modules\Roomtype\Http\Controllers'], function()
{
    Route::any('/create', 'RoomtypeController@create')->name('roomtype.create');
    Route::get('/list', 'RoomtypeController@list')->name('roomtype.list');
    Route::any('/edit/{id}', 'RoomtypeController@edit')->name('roomtype.edit');
    Route::get('/remove/{id}', 'RoomtypeController@remove')->name('roomtype.remove');
     Route::get('/search', 'RoomtypeController@search')->name('roomtype.search');
});
