<?php

Route::group(['middleware' => 'web', 'prefix' => 'price', 'namespace' => 'Modules\Price\Http\Controllers'], function()
{
    Route::any('/create', 'PriceController@create')->name('price.create');
    Route::get('/list', 'PriceController@list')->name('price.list');
    Route::any('/edit/{id}', 'PriceController@edit')->name('price.edit');
    Route::get('/delete/{id}', 'PriceController@remove')->name('price.remove');
    Route::get('/search', 'PriceController@search')->name('price.search');
   Route::get('/select/list', 'PriceController@dynamicsort')->name('price.select.list');
   
});
