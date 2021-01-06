<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddReservationController;

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
    return view('welcome');
});

/* Jakbyś miał problem z route'em że klasa kontrolera nie istnieje to
to najpewniej dlatego że stary syntax uzywasz, jednym z fixow jest 
podanie pelnej sciezki jak ponizej*/
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin routes
Route::get('/view-up-res','App\Http\Controllers\AdminUpcomingReservationsController@index')->middleware('admin');
Route::get('delete/{id}','App\Http\Controllers\AdminUpcomingReservationsController@destroy')->middleware('admin');

//user routes
Route::get('delete-u/{id}','App\Http\Controllers\UserUpcomingReservationsController@destroy')->middleware('auth');
Route::view('add','add_reserv')->middleware('auth');
Route::post('add',[AddReservationController::class,'addReservation'])->middleware('auth');
Route::get('/view-up-res-u','App\Http\Controllers\UserUpcomingReservationsController@index')->middleware('auth');