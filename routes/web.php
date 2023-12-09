<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\UsersController;

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
    return view('auth/login');
});

Route::get('/kasir', [KasirController::class,'index'])->name('kasir');

Route::get('/tabel/kategory',[CategoryController::class,'index'])->name('kategori');

Route::get('/tabel/barang',[ItemController::class,'index'])->name('barang');

Route::get('/laporan/pengeluaran', [ExpensesController::class,'index'])->name('pengeluaran');

Route::get('/laporan/pemasukan', [InvoicesController::class,'index'])->name('pemasukan');

Route::get('/users', [UsersController::class,'index'])->name('users');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
