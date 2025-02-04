<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $invoice = Transaction::with('items')->orderBy('created_at', 'desc')->get();
        return view('layouts/rep-invoices',['invoice' => $invoice]);
    }

    public function transaction(){
        $invoice = Transaction::with('items')->orderBy('created_at', 'desc')->get()->groupBy('created_at');
        return view('layouts/table-transaction',['invoice' => $invoice]);
    }
    public function ktransaction(){
        $invoice = Transaction::with('items')->orderBy('created_at', 'desc')->get()->groupBy('created_at');
        return view('layouts/k-transaction',['invoice' => $invoice]);
    }

    public function printNota ($id){
        $fornow = Transaction::find($id);
        $nota = Transaction::with('items')->where('created_at', $fornow->created_at)->get();
        $totalall = 0;
        foreach ($nota as $n){
            $totalall += $n->total;
        }
        //dump(count($nota))
            return view('layouts/print-pastReceipt',['histori' => $nota,'totalall'=> $totalall]);
            
        }
        
    public function kprintNota ($id){
        $fornow = Transaction::find($id);
        $nota = Transaction::with('items')->where('created_at', $fornow->created_at)->get();
        $totalall = 0;
        foreach ($nota as $n){
            $totalall += $n->total;
        }
        //dump(count($nota));
            return view('layouts/k-pastReceipt',['histori' => $nota,'totalall'=> $totalall]);
        }

    public function getHarian (){
        $now = Carbon::now()->format('Y-m-d');
        $pesanan = Transaction::with('items')
        ->whereDate('created_at', $now)
        ->orderBy('created_at','desc')
        ->get();
        $nows = Carbon::now()->format('d-m-Y');
        $rekap = 'Harian';
        $temp = 'Tanggal';
        return view('layouts/rep-invoices',['invoice'=> $pesanan,'now'=> $nows,'rekap'=>$rekap,'tanggal'=> $temp]);
    }

    public function filteredHarian (Request $request){
        $rekap = 'Harian';
        $temp = 'Tanggal';
        $pesanan = Transaction::with('items')->whereDate('created_at', $request->filter_tgl)->get();
        $d = $request->filter_tgl[8].$request->filter_tgl[9];
        $m = $request->filter_tgl[5].$request->filter_tgl[6];
        $y = $request->filter_tgl[0].$request->filter_tgl[1].$request->filter_tgl[2].$request->filter_tgl[3];
        $filters = $d . '-' . $m . '-' . $y;
        return view('layouts/rep-invoices',['invoice'=> $pesanan,'rekap'=>$rekap,'tanggal'=> $temp,'filter' => $filters]);
    }

    public function getBulanan()
    {
        $nows = Carbon::now()->isoFormat('MMMM');
        $nowm = Carbon::now()->format('m');
        $nowy = Carbon::now()->format('Y');
        $pesanan = Transaction::with('items')
        ->whereMonth('created_at', $nowm)
        ->whereYear('created_at', $nowy)
        ->get();
        $rekap = 'Bulanan';
        $temp = 'Bulan';
        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        return view('layouts/rep-invoices',['invoice'=> $pesanan,'now'=> $nows,'rekap'=>$rekap,'tanggal'=> $temp,'bulan'=> $bulan]);
    }

    public function filteredBulanan(Request $request)
    {
        $rekap = 'Bulanan';
        $temp = 'Bulan';
        $nowy = Carbon::now()->format('Y');
        $pesanan = Transaction::with('items')
        ->whereMonth('created_at', $request->bulan)
        ->whereYear('created_at', $nowy)
        ->get();
        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $filters = $bulan[$request->bulan - 1];
        return view('layouts/rep-invoices',['invoice'=> $pesanan,'filter'=> $filters,'rekap'=>$rekap,'tanggal'=> $temp,'bulan'=> $bulan]);
    }

    public function getTahunan()
    {
        $years = range(2020, Carbon::now()->year);
        $nows = Carbon::now()->isoFormat('YYYY');
        $nowm = Carbon::now()->format('Y');
        $pesanan = Transaction::with('items')->whereYear('created_at', $nowm)->get();
        $rekap = 'Tahunan';
        $temp = 'Tahun';
        return view('layouts/rep-invoices',['invoice'=> $pesanan,'now'=> $nows,'rekap'=>$rekap,'tanggal'=> $temp,'tahun'=> $years]);
    }

    public function filteredTahunan(Request $request)
    {
        $years = range(2020, Carbon::now()->year);
        $filters = $request->tahun;
        $nowm = Carbon::now()->format('Y');
        $pesanan = Transaction::with('items')->whereYear('created_at', $request->tahun)->get();
        $rekap = 'Tahunan';
        $temp = 'Tahun';
        return view('layouts/rep-invoices',['invoice'=> $pesanan,'filter'=> $filters,'rekap'=>$rekap,'tanggal'=> $temp,'tahun'=> $years]);
    }
}
