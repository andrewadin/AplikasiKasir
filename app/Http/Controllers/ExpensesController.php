<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Outcome;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $laporan = Outcome::with('items')->get();
        return view('layouts/rep-expense',['laporan' => $laporan]);
    }

    public function store(Request $request){
        $item = Items::find($request->id);
        $newstk = $request->stk + $item->stok;
        $newharga = str_replace(",","",$request->harga_beli);
        $newjual = str_replace(",","",$request->harga_jual);
        $newtotal = str_replace(".","",$request->total);
        Items::updateOrCreate([
            'id' => $request->id],
        [
            'item_name' => $request->nama_barang,
            'stok' => $newstk,
            'buy_price' => $newharga,
            'sell_price' => $newjual,
        ]);

        Outcome::updateOrCreate([
            'id_item' => $request->id,
            'price' => $newharga,
            'qty' => $request->stk,
            'total' => $newtotal,
        ]);

        return redirect('/home')->with('alert','Restock berhasil');
    }
}
