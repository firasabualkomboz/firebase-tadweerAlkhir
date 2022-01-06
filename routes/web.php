<?php

// use App\Http\Controllers\Admin\CategoryController;
// use App\Http\Controllers\Admin\DonationController;
// use App\Http\Controllers\Admin\PartnerController;
// use App\Http\Controllers\Admin\UserController;
// use App\Http\Controllers\OrdersController;
// use App\Http\Controllers\DriversController;
// use App\Http\Controllers\DonationsController;
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

// Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/',function(){
  return view('auth.login');

});


// Route::get('/', function () {
//     return view('admin.pages.index');
// })->name('home')->middleware('auth');



Route::group([], function (){

    Route::prefix('admin')
        ->middleware('auth')
        // ->name('admin.')
        ->group(function (){


            // categories
            Route::resource('/categories',\Admin\CategoryController::class);
            // Route::delete('delete-category/{id}','\Admin\CategoryController@destroy');

            // donations
            Route::resource('donations', \Admin\DonationController::class);
            // Route::delete('delete-donation/{id}',\Admin\DonationController::class  , 'destroy');

            // partners
            Route::resource('partners', \Admin\PartnerController::class);
            Route::delete('delete-partner/{id}',[ PartnerController::class,'destroy']);

            // users
            Route::resource('users', \Admin\UserController::class);
            Route::delete('delete-user/{id}',[ UserController::class,'destroy']);



        });

});






// Route::get('donations', [DonationsController::class, 'show'])->name('donations')->middleware('auth');
// Route::get('orders', [OrdersController::class, 'show'])->name('orders')->middleware('auth');
// Route::get('drivers', [DriversController::class, 'show'])->name('drivers')->middleware('auth');

