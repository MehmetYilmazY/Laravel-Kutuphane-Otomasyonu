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

Route::get('/uye_edit/{id}', [App\Http\Controllers\KitapController::class, 'uyeEdit'])->name('kitap.uyeEdit');
Route::put('/uye_update/{id}', [App\Http\Controllers\KitapController::class, 'uyeUpdate'])->name('kitap.uyeUpdate');
Route::delete('/uye_delete/{id}', [KitapController::class, 'uyeDestroy'])->name('kitap.uyeDestroy');


Route::get('/kitaplar', [KitapController::class, 'kitaplar'])->name('kitap.kitaplar');

Route::get('/uyeler', [KitapController::class, 'uyeler'])->name('kitap.uyeler');


Route::get('/kisiler', [KitapController::class, 'kullaniciCreate'])->name('kitap.kisiler');
Route::post('/kisiler', [KitapController::class, 'kullaniciStore'])->name('kitap.kullaniciStore');

Route::get('/satilik', [KitapController::class, 'satilikCreate'])->name('kitap.satilik');
Route::post('/satilik', [KitapController::class, 'satilikStore'])->name('kitap.satilikStore');

Route::get('/satiliklist', [KitapController::class, 'satilikList'])->name('kitap.satiliklist');

Route::post('/kitap/satin-al/{id}', [KitapController::class, 'satinAl'])->name('kitap.satinAl');
Route::get('/kullanici/envanter', 'App\Http\Controllers\KitapController@envanter')->name('kullanici.envanter');

