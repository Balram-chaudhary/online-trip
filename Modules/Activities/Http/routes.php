<?php

Route::group(['middleware' => 'web', 'prefix' => 'activities', 'namespace' => 'Modules\Activities\Http\Controllers'], function()
{
    Route::any('/create', 'ActivitiesController@create')->name('activities.create');
    Route::get('/list', 'ActivitiesController@list')->name('activities.list');
    Route::any('/edit/{id}', 'ActivitiesController@edit')->name('activities.edit');
    Route::get('/remove/{id}', 'ActivitiesController@remove')->name('activities.remove');
    Route::get('/search/list','ActivitiesController@searchlist')->name('activities.search.list');
   
});
