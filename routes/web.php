<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\DonationsController;

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
    return view('admin.pages.index');
})->name('home');


Route::get('donations', [DonationsController::class, 'show'])->name('donations');
Route::get('orders', [OrdersController::class, 'show'])->name('orders');
Route::get('drivers', [DriversController::class, 'show'])->name('drivers');

// categories
Route::resource('categories', CategoryController::class);
Route::delete('delete-category/{id}',[ CategoryController::class,'destroy']);
// donations
Route::resource('donations', DonationController::class);
Route::delete('delete-donation/{id}',[ DonationController::class,'destroy']);
// partners
Route::resource('partners', PartnerController::class);
Route::delete('delete-partner/{id}',[ PartnerController::class,'destroy']);

// users
Route::resource('users', UserController::class);
Route::delete('delete-user/{id}',[ UserController::class,'destroy']);


// test

Route::get('test', function () {

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
