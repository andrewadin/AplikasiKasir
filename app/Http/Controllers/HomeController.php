<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Outcome;
use App\Models\Transaction;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

        $mdataget = Transaction::select(DB::raw("SUM(total) as sum"))
                -> whereMonth('created_at',(date('m')))
                -> whereYear('created_at',(date(Carbon::now()->year)))
                -> groupBy(DB::raw("Day(created_at)"))
                -> pluck('sum');

        $day = Transaction::select(DB::raw("DAY(created_at) as day"))
                -> whereMonth('created_at',(date('m')))
                -> whereYear('created_at',(date(Carbon::now()->year)))
                -> groupBy(DB::raw("Day(created_at)"))
                -> pluck('day');
        // dump($mdataget);
        // dump($day);
        return view('layouts/dashboard',['items' => $items, 'income' => $income, 'expenses' => $expenses, 'stock' => $stock, 'nstock' => $nstock], compact('mdataget','day'));
    }

    public function testnota(){
        return view('layouts/receipttest');
    }
}
