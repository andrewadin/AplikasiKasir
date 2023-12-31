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
        Items::updateOrCreate([
            'id' => $request->id],
        [
            'stok' => $request->stk,
        ]);

        Outcome::updateOrCreate([
            'id_item' => $request->id,
            'price' => $request->harga,
            'qty' => $request->stk,
            'total' => $request->total,
        ]);

        return redirect('/laporan/pengeluaran');
    }
}
