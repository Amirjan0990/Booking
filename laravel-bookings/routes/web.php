<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistratesController;

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
    return view('index');
});*/

Route::resource('register', RegistratesController::class);
//Route::post('/registrate/index', 'RegistratesController@index')->name('registrate.index');
Route::delete('/registrate/{id}', [RegistratesController::class,'destroy'])->name('registrate.destroy');
Route::get('/registrate/{id}/edit', [RegistratesController::class, 'edit'])->name('registrate.edit');
Route::put('/registrate/{registrate}', [RegistratesController::class, 'update'])->name('registrate.update');


//Route::get('/create', [RegisterController::class, 'create'])->name('registrate.create');
