<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index() {
        $kategori = DB::table('category')->get();
        return view('layouts/table-category',['kategori' => $kategori]);
    }
}
