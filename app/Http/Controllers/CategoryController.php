<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $kategori = Category::all();
        return view('layouts/table-category',['kategori' => $kategori]);
    }

    public function add(){
        return view('layouts/add-category');
    }

    public function store(Request $request){
        Category::updateOrCreate([
            'category' => $request->category,
        ]);

        return redirect('/tabel/kategori')->with('alert','Penambahan kategori berhasil');
    }

    public function edit($id){
        $kategori = Category::find($id);
        return view('layouts/edit-category',['kategori' => $kategori]);
    }

    public function update($id,Request $request){
        Category::updateOrCreate(
            ['id' => $id],
            ['category' => $request->category,
        ]);
        return redirect('/tabel/kategori')->with('alert','Perubahan kategori berhasil');
    }

    public function delete(Request $request){
        Category::where('id', $request->id)->delete();
        return redirect('/tabel/kategori')->with('alert','Hapus kategori berhasil');
    }
}
