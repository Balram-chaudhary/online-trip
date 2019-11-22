<?php
Route::group(['middleware' => 'web', 'prefix' => 'buses', 'namespace' => 'Modules\Buses\Http\Controllers'], function()
{
    Route::get('/', 'BusesController@index');
    Route::any('/create', 'BusesController@create')->name('buses.create');
    Route::get('/list', 'BusesController@list')->name('buses.list');
    Route::any('/edit/{id}', 'BusesController@edit')->name('buses.edit');
    Route::get('/remove/{id}', 'BusesController@remove')->name('buses.remove');
    Route::get('/search','BusesController@search')->name('buses.search');

});
