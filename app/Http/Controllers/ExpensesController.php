<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Outcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        $rules = array(
            'category' => 'required',
            'nama_barang' => 'required',
            'stk' => 'integer',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'total' => 'required'
        );

        $messages = array(
            'category.required' => 'Kategori kosong',
            'nama_barang.required' => 'Barang kosong',
            'nama_barang.unique' => 'Barang sudah ada',
            'harga_beli.required' => 'Harga beli kosong',
            'harga_jual.required' => 'Harga jual kosong'
        );

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails())
        {
            return redirect('/tabel/barang/restock/'.$request->id)
            ->withErrors($validator);
        }

        $item = Items::find($request->id);
        $stk = 0;
        $stk = $request->stk;
        $newstk = $request->stk + $item->stok;
        $newharga = str_replace(",","",$request->harga_beli);
        $newjual = str_replace(",","",$request->harga_jual);
        $newtotal = str_replace(".","",$request->total);
        if($stk == 0){
            Items::updateOrCreate([
                'id' => $request->id],
            [
                'id_category' => $request->category,
                'item_name' => $request->nama_barang,
                'buy_price' => $newharga,
                'sell_price' => $newjual,
            ]);

            return redirect('/home')->with('alert','Edit berhasil');
        } else {
            Items::updateOrCreate([
                'id' => $request->id],
            [
                'id_category' => $request->category,
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
}
