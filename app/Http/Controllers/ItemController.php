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
        Items::updateOrCreate([
            'id_category' => $request->category,
            'item_name' => $request->item_name,
            'stok' => $request->stok,
            'buy_price' => $request->buy_price,
            'sell_price' => $request->sell_price,
        ]);

        return redirect('/tabel/barang');
    }

    public function edit(Request $request, $id){
        $barang = Items::find($id);
        $kategori = Category::all();
        return view('layouts/edit-items',['barang' => $barang, 'kategori' => $kategori]);
    }

    public function update(Request $request, $id){
        Items::updateOrCreate(
            ['id' => $id],
            [
            'id_category' => $request->category,
            'item_name' => $request->item_name,
            'stok' => $request->stok,
            'buy_price' => $request->buy_price,
            'sell_price' => $request->sell_price,
        ]);

        return redirect('/tabel/barang');
    }

    public function delete(Request $request){
        Items::where('id', $request->id)->delete();
        return redirect('/tabel/barang');
    }
}
