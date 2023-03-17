<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('home');
})->name('home');


Route::get('/rout', 'App\Http\Controllers\MainController@allRoutes')->name('rout');

Route::post('/buy_ticket/{id}', 'App\Http\Controllers\MainController@buy_ticket')->name('buy_ticket');

Route::get('/search', 'App\Http\Controllers\MainController@search')->name('search');

//PDF

Route::get('/topdf', 'App\Http\Controllers\MainController@topdf')->name('topdf');
Route::get('/pdf', 'App\Http\Controllers\MainController@pdf')->name('pdf');

Route::get('/admtickets', 'App\Http\Controllers\MainController@admtickets')->name('admtickets');

Route::post('/ticket', 'App\Http\Controllers\MainController@ticket')->name('ticket');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', function () {
    Auth::logout();
    return redirect(route('home'));
})->name('logout');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/account', 'App\Http\Controllers\MainController@account')->name('account');
Route::post('/delete_ticket', 'App\Http\Controllers\MainController@deleteTicket')->name('deleteTicket');

Route::get('/', function () {
    return view('home');
})->name('index');

Route::get('/ticket', 'App\Http\Controllers\TicketController@export')->name('ticketExport');


//admin

Route::get('/admin', 'App\Http\Controllers\AdminController@toPanel')->name('toPanel');

Route::get('/trips', 'App\Http\Controllers\AdminController@admintrips')->name('admintrips');

Route::get('/add_trip', 'App\Http\Controllers\AdminController@add_trip')->name('add_trip');

Route::post('/do_add_trip', 'App\Http\Controllers\AdminController@do_add_trip')->name('do_add_trip');

Route::get('/drivers', 'App\Http\Controllers\AdminController@drivers')->name('drivers');

Route::get('/add_driver', 'App\Http\Controllers\AdminController@add_driver')->name('add_driver');

//admin search

Route::post('/adminTripSearch', 'App\Http\Controllers\AdminController@adminTripSearch')->name('adminTripSearch');

Route::get('/auto', 'App\Http\Controllers\AdminController@auto')->name('auto');


Route::post('/list', 'App\Http\Controllers\AdminController@list')->name('list');

