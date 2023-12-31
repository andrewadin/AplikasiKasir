<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Transaction;
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

    public function store(Request $request){
        for ($barang = 0; $barang < count($request->barang); $barang++){
            Transaction::updateOrCreate([
                'id_item' => $request->barang[$barang],
                'price' => $request->harga[$barang],
                'qty' => $request->stk[$barang],
                'total' => $request->total[$barang],
            ]);
        }

        return redirect('/kasir');
    }
}
