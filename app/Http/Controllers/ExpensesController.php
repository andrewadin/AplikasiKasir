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
        $laporan = Outcome::with('items')->orderBy('created_at', 'desc')->get();
        return view('layouts/rep-expense',['laporan' => $laporan]);
    }

    public function store(Request $request){

        $rules = array(
            'nama_barang' => 'required',
            'stk' => 'integer',
            'harga_beli' => 'required',
            'total' => 'required'
        );

        $messages = array(
            'nama_barang.required' => 'Barang kosong',
            'nama_barang.unique' => 'Barang sudah ada',
            'harga_beli.required' => 'Harga beli kosong'
        );

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails())
        {
            return redirect('/tabel/barang/restock/'.$request->id)
            ->withErrors($validator);
        }

        $item = Items::find($request->id);
        $newstk = $request->stk + $item->stok;
        $newharga = str_replace(",","",$request->harga_beli);
        $newtotal = str_replace(".","",$request->total);
        Items::updateOrCreate([
            'id' => $request->id],
        [
            'stok' => $newstk,
            'buy_price' => $newharga
        ]);

        Outcome::Create([
            'id_item' => $request->id,
            'price' => $newharga,
            'qty' => $request->stk,
            'total' => $newtotal,
        ]);

        return redirect('/home')->with('alert','Restock berhasil');
    }
}
