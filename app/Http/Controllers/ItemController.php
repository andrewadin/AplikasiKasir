<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $rules = array(
            'category' => 'required',
            'item_name' => 'required|unique:items',
            'stok' => 'required',
            'buy_price' => 'required',
            'sell_price' => 'required'
        );

        $messages = array(
            'category.required' => 'Kategori kosong',
            'item_name.required' => 'Barang kosong',
            'item_name.unique' => 'Barang sudah ada',
            'stok.required' => 'Stok kosong',
            'buy_price.required' => 'Harga beli kosong',
            'sell_price.required' => 'Harga jual kosong'
        );

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails())
        {
            return redirect('/tabel/barang/add')
            ->withErrors($validator);
        }

        $buy_price = str_replace(",","",$request->buy_price);
        $sell_price = str_replace(",","",$request->sell_price);
        Items::updateOrCreate([
            'id_category' => $request->category,
            'item_name' => $request->item_name,
            'stok' => $request->stok,
            'buy_price' => $buy_price,
            'sell_price' => $sell_price,
        ]);

        return redirect('/tabel/barang')->with('alert','Penambahan produk berhasil');
    }

    public function edit($id){
        $barang = Items::find($id);
        $kategori = Category::all();
        return view('layouts/edit-items',['barang' => $barang, 'kategori' => $kategori]);
    }

    public function update(Request $request, $id){
        $rules = array(
            'category' => 'required',
            'item_name' => 'required|unique:items',
            'stok' => 'required',
            'buy_price' => 'required',
            'sell_price' => 'required'
        );

        $messages = array(
            'required' => ':attribute kosong',
            'item_name.required' => 'Barang kosong',
            'item_name.unique' => 'Barang sudah ada',
            'stok.required' => 'Stok kosong',
            'buy_price.required' => 'Harga beli kosong',
            'sell_price.required' => 'Harga jual kosong'
        );

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails())
        {
            return redirect('/tabel/barang/edit'.$id)
            ->withErrors($validator);
        }

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

        return redirect('/tabel/barang')->with('alert','Perubahan produk berhasil');
    }

    public function delete(Request $request){
        Items::where('id', $request->id)->delete();
        return redirect('/tabel/barang')->with('alert','Hapus produk berhasil');
    }

    public function restock(){
        $barang = Items::all();
        return view('layouts/restock',['barang' => $barang]);
    }

    public function restockid($id){
        $barang = Items::all();
        $sbarang = Items::find($id);
        $kategori = Category::all();
        return view('layouts/restockid',['barang' => $barang, 'sbarang' => $sbarang, 'kategori' => $kategori]);
    }
}
