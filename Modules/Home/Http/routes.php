<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Home\Http\Controllers'], function()
{
    Route::get('/', 'HomeController@index');
    Route::get('/specials','HomeController@specials')->name('specials.travelhimalayan');
    Route::get('/popularcities','HomeController@cities')->name('cities.travelhimalayan');
    Route::get('/trekking','HomeController@trekking')->name('trekking.travelhimalayan');
    Route::get('/religious','HomeController@religious')->name('religious.travelhimalayan');
    Route::get('/junglesafary','HomeController@junglesafary')->name('junglesafary.travelhimalayan');
    Route::get('/junglesafary/detail/{id}','HomeController@junglesafarydetail')->name('junglesafary.detail');
    Route::get('religious/detail/{id}','HomeController@religiousdetail')->name('religious.detail');
    Route::get('trekking/detail/{id}','HomeController@trekkingdetail')->name('trekking.detail');
    Route::get('cities/detail/{id}','HomeController@citiesdetail')->name('cities.detail');
    Route::get('specials/detail/{id}','HomeController@specialsdetail')->name('specials.detail');
    // activities
    Route::get('/activities/search','HomeController@search')->name('activities.search');
    Route::post('/activities','HomeController@activities')->name('activities');
    Route::get('/activities/detail/{id}','HomeController@activitiesdetail')->name('activities.detail');
    Route::post('/activities/availability/','HomeController@activitiesavailability')->name('activities.availability');                                                        
    Route::get('/activities/review','HomeController@activitiesreview')->name('activities.review');
    // Activities ends
    // Hotels
    Route::post('/hotels','HomeController@hotels')->name('hotels');
    Route::get('/hotels/search','HomeController@hotelsearch')->name('hotels.search');
    Route::get('/hotels/sort','HomeController@sort')->name('hotels.sort');
    Route::get('/hotels/sort/rating/result','HomeController@ratingsorthotel')->name('hotels.sort.result.rating');
    Route::get('/hotels/nearbylocation/result','HomeController@nearbylocation')->name('hotels.result.nearbylocation');
    Route::get('/hotels/detail/{id}','HomeController@hotelsdetail')->name('hotels.detail');
    Route::get('/hotels/review','HomeController@hotelreview')->name('hotels.review');
    Route::post('/hotels/payment','HomeController@hotelpayment')->name('hotel.payment');
   // hotel area 
    Route::get('/hotels/area/search','HomeController@hotelareasearch')->name('areahotel.search');
    Route::get('/hotels/availability/rooms','HomeController@roomsavailibility')->name('hotels.availability.rooms');
     Route::get('/hotels/book/rooms','HomeController@bookrooms')->name('hotels.book.rooms');

   // homestay
    Route::post('/homestays','HomeController@homestay')->name('homestays');
    Route::get('/homestays/search/result','HomeController@homestaysearch')->name('homestays.search.result');
    Route::get('/homestays/homestaysort/result','HomeController@homestaysort')->name('homestays.sort.result');
    Route::get('/homestays/homestaysort/rating/result','HomeController@homestaysortrating')->name('homestays.sort.result.rating');
    Route::get('/homestays/nearbylocation/result','HomeController@nearbylocationhomestay')->name('homestay.result.nearbylocation');
    Route::get('/homestays/detail/{id}','HomeController@homestaydetail')->name('homestay.detail');
    Route::post('/homestays/payment','HomeController@homestaypayment')->name('homestay.payment');
    // homestay area search 
    Route::get('/homestay/area/search','HomeController@homestayareasearch')->name('areahomestay.search');
    Route::get('/homestay/availability/rooms','HomeController@homestayroomsavailability')->name('homestay.availability.rooms');
    //homestay modifyarea search
    Route::get('/homestay/modifyarea/search','HomeController@homestaymodifyareasearch')->name('areahomestaymodify.search');
  // homestay review form
   Route::get('/homestay/review','HomeController@homestayreview')->name('homestay.review');
   Route::get('/homestay/book/rooms','HomeController@bookroomshomestay')->name('homestay.book.rooms');
    // bus
    // homestay area search 
    Route::get('/bus/areafrom/search','HomeController@busfromsearch')->name('busfrom.search');
    Route::get('/bus/areato/search','HomeController@bustosearch')->name('busto.search');
    Route::post('/buses','HomeController@busresult')->name('buses');
    Route::get('/buses/results/search','HomeController@busessearch')->name('busesresult.search');
    Route::post('/buses/time/sort','HomeController@busestimesort')->name('buses.time.sort');
    Route::get('/buses/price/sort','HomeController@busespricesort')->name('buses.price.sort');
    Route::post('/buses/type/sort','HomeController@busestypesort')->name('buses.type.sort');
    Route::get('/buses/detail/{id}','HomeController@busesdetail')->name('buses.detail');
    Route::get('/buses/review','HomeController@busreview')->name('buses.review');
    Route::get('/buses/availability/seats','HomeController@busesavailability')->name('bus.availability.seats');

//add property
    Route::get('/addproperty/signup','HomeController@add_your_property')->name('addproperty.signup');
    Route::post('/addproperty/signup/post','HomeController@add_your_property_post')->name('addproperty.signup.submit');
    Route::get('/addproperty/signup/password/{id}','HomeController@signuppassword')->name('signup.password');
    Route::post('/addproperty/signup/password','HomeController@signuppasswordpost')->name('signup.password.submit');
    
 //property list
Route::get('/property/listing','HomeController@propertylist')->name('property.listing');
Route::post('/property/listing/submit','HomeController@propertylistpost')->name('property.listing.submit');





 
});



