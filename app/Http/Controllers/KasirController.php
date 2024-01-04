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
        // return $request->all();
        for ($barang = 0; $barang < count($request->barang); $barang++){
            $item = Items::find($request->barang[$barang]);
            $stk = $item->stok;
            $newstk = $stk - $request->stk[$barang];
            $harga = $request->harga[$barang];
            $total = $request->total[$barang];
            $newharga = str_replace(".","",$harga);
            $newtotal = str_replace(".","",$total);

            Items::updateOrCreate([
                'id' => $request->barang[$barang]
            ],[
                'stok' => $newstk,
            ]);

            Transaction::updateOrCreate([
                'id_item' => $request->barang[$barang],
                'price' => $newharga,
                'qty' => $newstk,
                'discount' => $request->diskon[$barang],
                'total' => $newtotal,
            ]);
        }

        // return view('layouts/receipt',['receipt' => $request->all()]);
        return redirect('/kasir');
    }
}
