<?php

Route::group(['middleware' => 'web', 'prefix' => 'seats', 'namespace' => 'Modules\Seats\Http\Controllers'], function()
{
    Route::any('/create', 'SeatsController@create')->name('seats.create');
    Route::any('/seatupdate/{id}', 'SeatsController@seatupdate')->name('seats.edit');
    // Route::get('/remove/{id}', 'SeatsController@remove')->name('seats.remove');
    // Route::get('/search','SeatsController@search')->name('seats.search');
});
