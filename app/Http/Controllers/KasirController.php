<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Transaction;
use Illuminate\Http\Request;
use charlieuki\ReceiptPrinter\ReceiptPrinter as ReceiptPrinter;

class KasirController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $barang = Items::all();
        return view('layouts/kasir',['barang' => $barang]);
    }

    public function store(Request $request){
        if (str_replace(",","",$request->uang_bayar) >= $request->totalall) {
            // $mid = '115607089952';
            // $store_name = 'Lugusranu';
            // $store_address = 'Mart Address';
            // $store_phone = '08199909999';
            // $store_email = 'lugusranu.shop@gmail.com';
            // $store_website = 'lugusranu.com';
            // $tax_percentage = 0;
            // $transaction_id = 'TX';
            // $currency = 'Rp';


            // $printer = new ReceiptPrinter;
            // $printer->init(
            //     config('receiptprinter.connector_type'),
            //     config('receiptprinter.connector_descriptor'),
            // );

            for ($barang = 0; $barang < count($request->barang); $barang++){
                $item = Items::find($request->barang[$barang]);
                $stk = $item->stok;
                $newstk = $stk - $request->stk[$barang];
                $stko = $request->stk[$barang];
                $harga = $request->harga[$barang];
                $total = $request->total[$barang];
                $newharga = str_replace(".","",$harga);
                $newtotal = str_replace(".","",$total);

                $items[] = $item->item_name;
                $hargas[] = $harga;
                $stks[] = $stko;
                $totals[] = $total;

                if ($request->stk[$barang] <= $stk) {
                    Items::updateOrCreate([
                        'id' => $request->barang[$barang]
                    ],[
                        'stok' => $newstk,
                    ]);

                    Transaction::updateOrCreate([
                        'id_item' => $request->barang[$barang],
                        'price' => $newharga,
                        'qty' => $newstk,
                        'discount' => $request->diskon[$barang],
                        'total' => $newtotal,
                    ]);
                } else {
                    if (auth()->user()->type == 'admin') {
                        return redirect('/kasir')->with('alert','Stok '.$items[$barang].' kurang atau habis !');
                    }else{
                        return redirect('/khome')->with('alert','Stok '.$items[$barang].' kurang atau habis !');
                    }
                }


                // $printer->addItem(
                //     $items[$barang],
                //     $stks[$barang],
                //     $newharga
                // );
            }

            // $printer->setStore($mid, $store_name, $store_address, $store_phone, $store_email, $store_website);
            // $printer->setLogo($image_path);
            // $printer->calculateSubTotal();
            // $printer->calculateGrandTotal();

            // $printer->printReceipt();

            if (auth()->user()->type == 'admin') {
                // return redirect('/kasir')->with('alert','Pembayaran berhasil');
                return view('layouts/receipt',['items' => $items, 'harga' => $hargas, 'stk' => $stks, 'total' => $totals, 'receipt' => $request->all()]);
            }else{
                // return redirect('/khome')->with('alert','Pembayaran berhasil');
                return view('layouts/k-receipt',['items' => $items, 'harga' => $hargas, 'stk' => $stks, 'total' => $totals, 'receipt' => $request->all()]);
            }
        } else {
            if (auth()->user()->type == 'admin') {
                return redirect('/kasir')->with('alert','Uang pembayaran kurang !');
            }else{
                return redirect('/khome')->with('alert','Uang pembayaran kurang !');
            }
        }
    }
}
