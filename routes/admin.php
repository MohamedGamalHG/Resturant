<?php

Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'auth'],function (){
    Route::get('dashboard','DashboardController@index')->name('admin.dashboard');
    Route::resource('slider','SliderController');
    Route::resource('category','CategoryController');
    Route::resource('item','ItemController');
    Route::get('reserve','ReservationController@index')->name('reserve.index');
    Route::post('reserve/{id}','ReservationController@status')->name('reserve.status');
    Route::delete('reserve/{id}','ReservationController@destroy')->name('reserve.destroy');
    Route::get('contact','ContactController@contact')->name('admin.contact');
    Route::get('contact/{id}','ContactController@show')->name('contact.show');
    Route::delete('contact/{id}','ContactController@destroy')->name('contact.destroy');
});
