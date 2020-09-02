<?php

Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'auth'],function (){
    Route::get('dashboard','DashboardController@index')->name('admin.dashboard');
    Route::resource('slider','SliderController');
    Route::resource('category','CategoryController');
    Route::resource('item','ItemController');
});
