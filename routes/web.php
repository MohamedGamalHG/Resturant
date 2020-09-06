<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('welcome');
Route::post('/reserve', 'ReservationController@reserve')->name('user.reserve');
Route::post('/contact', 'ContactController@contact')->name('user.contact');
Auth::routes();



/*Route::get('dash',function (){
    return view('admin.dashboard');
});*/


//Route::get('admin/dash','TitleRequest\DashboardController@index')->name('admin.dashboard');


