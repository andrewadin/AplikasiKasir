<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $kategori = DB::table('category')->get();
        return view('layouts/table-item',['kategori' => $kategori]);
    }
}
