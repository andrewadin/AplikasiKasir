<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Items;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $barang = Items::with('category')->get();
        return view('layouts/table-item',['barang' => $barang]);
    }

    public function add(){
        $category = Category::all();
        return view('layouts/add-items',['category' => $category]);
    }

    public function store(Request $request){
        $buy_price = str_replace(",","",$request->buy_price);
        $sell_price = str_replace(",","",$request->sell_price);
        Items::updateOrCreate([
            'id_category' => $request->category,
            'item_name' => $request->item_name,
            'stok' => $request->stok,
            'buy_price' => $buy_price,
            'sell_price' => $sell_price,
        ]);

        return redirect('/tabel/barang');
    }

    public function edit($id){
        $barang = Items::find($id);
        $kategori = Category::all();
        return view('layouts/edit-items',['barang' => $barang, 'kategori' => $kategori]);
    }

    public function update(Request $request, $id){
        $buy_price = str_replace(",","",$request->buy_price);
        $sell_price = str_replace(",","",$request->sell_price);
        Items::updateOrCreate(
            ['id' => $id],
            [
            'id_category' => $request->category,
            'item_name' => $request->item_name,
            'stok' => $request->stok,
            'buy_price' => $buy_price,
            'sell_price' => $sell_price,
        ]);

        return redirect('/tabel/barang');
    }

    public function delete(Request $request){
        Items::where('id', $request->id)->delete();
        return redirect('/tabel/barang');
    }

    public function restock(){
        $barang = Items::all();
        return view('layouts/restock',['barang' => $barang]);
    }

    public function restockid($id){
        $barang = Items::all();
        $sbarang = Items::find($id);
        return view('layouts/restockid',['barang' => $barang, 'sbarang' => $sbarang]);
    }
}
