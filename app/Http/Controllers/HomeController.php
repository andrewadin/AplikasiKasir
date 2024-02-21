<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Outcome;
use App\Models\Transaction;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function kasirindex()
    {
        $barang = Items::all();
        return view('layouts/k-kasir',['barang' => $barang]);
    }

    public function index()
    {
        $items = Items::all();
        $stock = Items::where('stok','<','100')->get();
        $nstock = Items::where('stok','<','100')->count();
        $income = Transaction::all()->sum('total');
        $expenses = Outcome::all()->sum('total');

        $mdataget = Transaction::select(DB::raw("COUNT(*) as count"))
                -> whereYear('created_at',(date('Y')))
                -> groupBy(DB::raw("Month(created_at)"))
                ->pluck('count');
        return view('layouts/dashboard',['items' => $items, 'income' => $income, 'expenses' => $expenses, 'stock' => $stock, 'nstock' => $nstock], compact('mdataget'));
    }
}
