<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KitapController;

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

Route::get('/uyeler', [KitapController::class, 'uyeler'])->name('kitap.uyeler');


Route::get('/kisiler', [KitapController::class, 'kullaniciCreate'])->name('kitap.kisiler');
Route::post('/kisiler', [KitapController::class, 'kullaniciStore'])->name('kitap.kullaniciStore');
