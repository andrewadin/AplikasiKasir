<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $barang = Items::all();
        return view('layouts/kasir',['barang' => $barang]);
    }
}
