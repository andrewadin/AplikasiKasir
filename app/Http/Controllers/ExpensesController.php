<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Outcome;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExpensesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $laporan = Outcome::with('items')->orderBy('created_at', 'desc')->get();
        return view('layouts/rep-expense',['laporan' => $laporan]);
    }

    public function store(Request $request){

        $rules = array(
            'nama_barang' => 'required',
            'stk' => 'integer',
            'harga_beli' => 'required',
            'total' => 'required'
        );

        $messages = array(
            'nama_barang.required' => 'Barang kosong',
            'nama_barang.unique' => 'Barang sudah ada',
            'harga_beli.required' => 'Harga beli kosong'
        );

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails())
        {
            return redirect('/tabel/barang/restock/'.$request->id)
            ->withErrors($validator);
        }

        $item = Items::find($request->id);
        $newstk = $request->stk + $item->stok;
        $newharga = str_replace(",","",$request->harga_beli);
        $newtotal = str_replace(".","",$request->total);
        Items::updateOrCreate([
            'id' => $request->id],
        [
            'stok' => $newstk,
            'buy_price' => $newharga
        ]);

        Outcome::Create([
            'id_item' => $request->id,
            'price' => $newharga,
            'qty' => $request->stk,
            'total' => $newtotal,
        ]);

        return redirect('/home')->with('alert','Restock berhasil');
    }
    
    public function getHarian (){
        $now = Carbon::now()->format('Y-m-d');
        $pesanan = Outcome::with('items')
        ->whereDate('created_at', $now)
        ->orderBy('created_at','desc')
        ->get();
        $nows = Carbon::now()->format('d-m-Y');
        $rekap = 'Harian';
        $temp = 'Tanggal';
        return view('layouts/rep-expense',['invoice'=> $pesanan,'now'=> $nows,'rekap'=>$rekap,'tanggal'=> $temp]);
    }

    public function filteredHarian (Request $request){
        $rekap = 'Harian';
        $temp = 'Tanggal';
        $pesanan = Outcome::with('items')->whereDate('created_at', $request->filter_tgl)->get();
        $d = $request->filter_tgl[8].$request->filter_tgl[9];
        $m = $request->filter_tgl[5].$request->filter_tgl[6];
        $y = $request->filter_tgl[0].$request->filter_tgl[1].$request->filter_tgl[2].$request->filter_tgl[3];
        $filters = $d . '-' . $m . '-' . $y;
        return view('layouts/rep-expense',['invoice'=> $pesanan,'rekap'=>$rekap,'tanggal'=> $temp,'filter' => $filters]);
    }

    public function getBulanan()
    {
        $nows = Carbon::now()->isoFormat('MMMM');
        $nowm = Carbon::now()->format('m');
        $nowy = Carbon::now()->format('Y');
        $pesanan = Outcome::with('items')
        ->whereMonth('created_at', $nowm)
        ->whereYear('created_at', $nowy)
        ->get();
        $rekap = 'Bulanan';
        $temp = 'Bulan';
        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        return view('layouts/rep-expense',['invoice'=> $pesanan,'now'=> $nows,'rekap'=>$rekap,'tanggal'=> $temp,'bulan'=> $bulan]);
    }

    public function filteredBulanan(Request $request)
    {
        $rekap = 'Bulanan';
        $temp = 'Bulan';
        $nowy = Carbon::now()->format('Y');
        $pesanan = Outcome::with('items')
        ->whereMonth('created_at', $request->bulan)
        ->whereYear('created_at', $nowy)
        ->get();
        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $filters = $bulan[$request->bulan - 1];
        return view('layouts/rep-expense',['invoice'=> $pesanan,'filter'=> $filters,'rekap'=>$rekap,'tanggal'=> $temp,'bulan'=> $bulan]);
    }

    public function getTahunan()
    {
        $years = range(2020, Carbon::now()->year);
        $nows = Carbon::now()->isoFormat('YYYY');
        $nowm = Carbon::now()->format('Y');
        $pesanan = Outcome::with('items')->whereYear('created_at', $nowm)->get();
        $rekap = 'Tahunan';
        $temp = 'Tahun';
        return view('layouts/rep-expense',['invoice'=> $pesanan,'now'=> $nows,'rekap'=>$rekap,'tanggal'=> $temp,'tahun'=> $years]);
    }

    public function filteredTahunan(Request $request)
    {
        $years = range(2020, Carbon::now()->year);
        $filters = $request->tahun;
        $nowm = Carbon::now()->format('Y');
        $pesanan = Outcome::with('items')->whereYear('created_at', $request->tahun)->get();
        $rekap = 'Tahunan';
        $temp = 'Tahun';
        return view('layouts/rep-expense',['invoice'=> $pesanan,'filter'=> $filters,'rekap'=>$rekap,'tanggal'=> $temp,'tahun'=> $years]);
    }
}
