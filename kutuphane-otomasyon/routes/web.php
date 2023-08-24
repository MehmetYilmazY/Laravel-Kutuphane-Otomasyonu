<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KitapController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/create', [App\Http\Controllers\KitapController::class, 'create'])->name('kitap.create');
Route::post('/create', [KitapController::class, 'store'])->name('kitap.store');

Route::get('/edit/{id}', [App\Http\Controllers\KitapController::class, 'edit'])->name('kitap.edit');
Route::put('/update/{id}', [App\Http\Controllers\KitapController::class, 'update'])->name('kitap.update');
Route::delete('/delete/{id}', [KitapController::class, 'destroy'])->name('kitap.destroy');


Route::get('/kitaplar', [KitapController::class, 'kitaplar'])->name('kitap.kitaplar');


