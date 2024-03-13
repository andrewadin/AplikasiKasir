<?php

namespace App\Http\Controllers;

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
}
