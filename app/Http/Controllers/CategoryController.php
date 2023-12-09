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
        Category::create([
            'category' => $request->category,
        ]);

        return redirect('/tabel/kategori');
    }

    public function edit($id){
        $kategori = Category::find($id);
        return view('layouts/edit-category',['kategori' => $kategori]);
    }

    public function update($id,Request $request){
        $kategori = Category::find($id);
        $kategori->category = $request->category;
        $kategori->save();
        return redirect('/tabel/kategori');
    }

    public function delete($id){
        $kategori = Category::find($id);
        $kategori->delete();
        return redirect('/tabel/kategori');
    }
}
