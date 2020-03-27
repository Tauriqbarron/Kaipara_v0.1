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

Route::get('/', function () {
    return view('index');
});

/*Service Provider Profile*/
Route::get('/service', function () {
    return view('Service.serviceProfileTemplate');
}) ->name('service.home');
/*Service Provider Booking Application Page*/
Route::get('/service/bookings', function () {
    return view('Service.serviceBookings');
}) ->name('service.Bookings');


/*Administrator part (Jay) */
Route::get('/admin', function () {
    return view('Administration.index');
});
