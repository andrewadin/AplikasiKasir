<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $rules = array(
            'category' => 'required|unique:categories'
        );

        $messages = array(
            'category.required' => 'Kategori kosong',
            'category.unique' => 'Kategori sudah ada'
        );

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails())
        {
            return redirect('/tabel/kategori/add')
            ->withErrors($validator);
        }

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
        $rules = array(
            'category' => 'required|unique:categories'
        );

        $messages = array(
            'category.required' => 'Kategori kosong',
            'category.unique' => 'Kategori sudah ada / sama'
        );

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails())
        {
            return redirect('/tabel/kategori/add')
            ->withErrors($validator);
        }

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
