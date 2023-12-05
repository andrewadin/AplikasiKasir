<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('layouts/dashboard');
});

Route::get('/blank',function () {
    return view('layouts/kasir');
});

Route::get('/table/category', function () {
    return view('layouts/table-category');
});

Route::get('/table/item', function () {
    return view('layouts/table-item');
});

Route::get('/acc/payment', function (){
    return view('layouts/acc-payment');
});

Route::get('/acc/expenses', function (){
    return view('layouts/acc-expense');
});

Route::get('/acc/invoices', function (){
    return view('layouts/acc-invoices');
});

Route::get('/report/expenses', function (){
    return view('layouts/rep-expense');
});

Route::get('/report/invoices', function (){
    return view('layouts/rep-invoices');
});

Route::get('/users', function(){
    return view('layouts/users');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
