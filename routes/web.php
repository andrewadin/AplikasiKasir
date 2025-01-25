<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/blank',function(){
    return view('layouts/blank');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/kasir', [KasirController::class,'index'])->name('kasir');

    Route::get('/tabel/kategori',[CategoryController::class,'index'])->name('kategori');
    Route::get('/tabel/kategori/add',[CategoryController::class,'add'])->name('kategori-add');
    Route::post('/tabel/kategori/simpan',[CategoryController::class,'store'])->name('kategori-store');
    Route::get('/tabel/kategori/edit/{id}',[CategoryController::class,'edit'])->name('kategori-edit');
    Route::put('/tabel/kategori/update/{id}',[CategoryController::class,'update'])->name('kategori-update');
    Route::delete('/tabel/kategori/delete',[CategoryController::class,'delete'])->name('kategori-delete');

    Route::get('/tabel/barang',[ItemController::class,'index'])->name('barang');
    Route::get('/tabel/barang/add',[ItemController::class,'add'])->name('barang-add');
    Route::post('/tabel/barang/simpan',[ItemController::class,'store'])->name('barang-store');
    Route::get('/tabel/barang/edit/{id}',[ItemController::class,'edit'])->name('barang-edit');
    Route::put('/tabel/barang/update/{id}',[ItemController::class,'update'])->name('barang-update');
    Route::delete('/tabel/barang/delete/',[ItemController::class,'delete'])->name('barang-delete');
    Route::get('/tabel/barang/restock', [ItemController::class,'restock'])->name('barang-restock');
    Route::get('/tabel/barang/restock/{id}', [ItemController::class,'restockid'])->name('barang-restockid');

    Route::post('/kasir/store',[KasirController::class,'store'])->name('kasir-store');
    Route::put('/restock', [ExpensesController::class,'store'])->name('restock');
    Route::get('/laporan/pengeluaran', [ExpensesController::class,'index'])->name('pengeluaran');

    Route::get('/laporan/pemasukan', [InvoicesController::class,'index'])->name('pemasukan');

    Route::get('/users', [UsersController::class,'index'])->name('users');
    Route::get('/users/add',[UsersController::class,'add'])->name('users-add');
    Route::post('/users/store',[UsersController::class,'store'])->name('users-store');
    Route::get('/users/edit/{id}',[UsersController::class,'edit'])->name('users-edit');
    Route::put('/users/update{id}',[UsersController::class,'update'])->name('users-update');
    Route::delete('/users/delete/{id}',[UsersController::class,'delete'])->name('users-delete');
    Route::get('/users/forgot/{id}',[UsersController::class,'forgotpsw'])->name('users-fpsw');
    Route::put('/users/change/{id}',[UsersController::class,'changepsw'])->name('users-cpsw');
    
    Route::get('/printNota/{id}',[InvoicesController::class,'printNota'])->name('printNota');
});

Route::middleware(['auth', 'user-access:kasir'])->group(function () {
    Route::get('/khome', [HomeController::class, 'kasirindex'])->name('khome');
    Route::post('/kasir/kstore',[KasirController::class,'store'])->name('kasir-kstore');
});
Route::get('/testchart123', [ChartController::class, 'index'])->name('testchart');
