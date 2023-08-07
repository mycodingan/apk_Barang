<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Promise\Create;

/*

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

Route::get('/', [InventoryController::class, 'tampilData'])->name('tampilData');

Route::post('tambah-inventori', [InventoryController::class, 'store']);

Route::get('mengubah-inventori/{id}', [InventoryController::class, 'mengubahData']);
Route::put('ubah-inventori/{id}', [InventoryController::class, 'ubahData']);

Route::get('hapus-inventory/{id}', [InventoryController::class, 'hapusData']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('tampil');

require __DIR__.'/auth.php';
