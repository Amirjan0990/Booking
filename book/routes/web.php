<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RestCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function (){
    return view('welcome');
});*/

Route::post('/booking', [BookingController::class, 'index'])->name('booking.index');
Route::post('/client', [ClientController::class, 'index'])->name('client.index');
Route::post('/food', [FoodController::class, 'index'])->name('food.index');
Route::post('/foodcater', [FoodCategoryController::class, 'index'])->name('foodcat.index');
Route::post('order', [OrderController::class, 'index'])->name('order.index');
Route::post('place', [PlaceController::class, 'index'])->name('place.index');
Route::post('/restaurant', [RestaurantController::class, 'index'])->name('restaurant.index');
Route::post('/user', [UserController::class, 'index'])->name('user.index');
Route::post('/rest', [RestCategoryController::class, 'index'])->name('rest.index');
