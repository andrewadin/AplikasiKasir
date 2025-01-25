<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Transaction;
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

    public function printNota ($id){
        $fornow = Transaction::find($id);
        $nota = Transaction::with('items')->where('created_at', $fornow->created_at)->get();
        return view('layouts/print-pastReceipt',['histori' => $nota]);
    }
}
