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

Route::get('/blank',function(){
    return view('layouts/blank');
});

Route::get('/kasir', [KasirController::class,'index'])->name('kasir');

Route::get('/tabel/kategori',[CategoryController::class,'index'])->name('kategori');
Route::get('/tabel/kategori/add',[CategoryController::class,'add'])->name('kategori-add');
Route::post('/tabel/kategori/simpan',[CategoryController::class,'store'])->name('kategori-store');
Route::get('/tabel/kategori/edit/{id}',[CategoryController::class,'edit'])->name('kategori-edit');
Route::post('/tabel/kategori/update/{id}',[CategoryController::class,'update'])->name('kategori-update');
Route::get('/tabel/kategori/delete/{id}',[CategoryController::class,'delete'])->name('kategori-delete');

Route::get('/tabel/barang',[ItemController::class,'index'])->name('barang');

Route::get('/laporan/pengeluaran', [ExpensesController::class,'index'])->name('pengeluaran');

Route::get('/laporan/pemasukan', [InvoicesController::class,'index'])->name('pemasukan');

Route::get('/users', [UsersController::class,'index'])->name('users');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
