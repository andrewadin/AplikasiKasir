@extends('layout.master')
@section('title')
    Tabel Transaksi
@endsection
@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Tabel Transaksi</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route ('home')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Tabel</li>
                        <li class="breadcrumb-item active">Transaksi</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Pembelian</th>
                                        <th>Produk</th>
                                        <th>Total</th>
                                        <th>Uang Bayar</th>
                                        <th>Kembalian</th>
                                        <th>Nota Pembelian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoice as $date_id => $outer)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$date_id}}</td>
                                        <td> @foreach ($outer as $data) {{$data->items->item_name.","}} @endforeach</td>
                                        <td><?php $totalall = 0;?>@foreach ($outer as $data) <?php $totalall += $data->total ?>@endforeach Rp. {{ number_format($totalall,0,',','.') }} </td>
                                        <td>@foreach ($outer as $tags) <?php $payment = ($tags->payment) ?> @endforeach Rp. {{ number_format($payment,0,',','.') }}</td>
                                        <td>@foreach ($outer as $tags) <?php $kembalian = ($tags->change_money) ?> @endforeach Rp. {{ number_format($kembalian,0,',','.') }}</td>
                                        <td>@foreach ($outer as $tags)<?php $id = $tags->id ?> @endforeach <a href="{{route('printNota',$id)}}" class="btn btn-success"><i class="fa fa-address-book" aria-hidden="true"></i> Print Nota</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
