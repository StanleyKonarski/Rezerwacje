<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddReservationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [WelcomeController::class, 'index']);

/* Jakbyś miał problem z route'em że klasa kontrolera nie istnieje to
to najpewniej dlatego że stary syntax uzywasz, jednym z fixow jest 
podanie pelnej sciezki jak ponizej*/
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

//admin routes
Route::get('/view-up-res','App\Http\Controllers\AdminUpcomingReservationsController@index')->middleware('admin');
Route::get('delete/{id}','App\Http\Controllers\AdminUpcomingReservationsController@destroy')->middleware('admin');
Route::get('/archiwum','App\Http\Controllers\ArchiveController@index')->middleware('admin');
Route::post('change',[HomeController::class, 'changePrice'])->middleware('admin');
//user routes
Route::get('delete-u/{id}','App\Http\Controllers\UserUpcomingReservationsController@destroy')->middleware('auth');
Route::view('add','add_reserv')->middleware('auth');
Route::post('add',[AddReservationController::class,'addReservation'])->middleware('auth');
Route::get('/view-up-res-u','App\Http\Controllers\UserUpcomingReservationsController@index')->middleware('auth');
Route::get('/stats','App\Http\Controllers\Statystyka@index')->middleware('auth');
Route::get('get_res','App\Http\Controllers\AddReservationController@getReservations');