@extends('layout.master')
@section('title')
    Laporan Pemasukan
@endsection
@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Halaman Pemasukan</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route ('home')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Laporan</li>
                        <li class="breadcrumb-item active">Pemasukan</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Kuantitas</th>
                                        <th>Total</th>
                                        <th>Uang Bayar</th>
                                        <th>Kembalian</th>
                                        <th>Tanggal Pembelian</th>
                                        <th>Nota Pembelian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoice as $i)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $i->items->item_name }}</td>
                                        <td>Rp. {{ number_format($i->price,0,',','.') }} </td>
                                        <td>{{ $i->qty }} </td>
                                        <td>Rp. {{ number_format($i->total,0,',','.') }}</td>
                                        <td>Rp. {{ number_format($i->payment,0,',','.') }}</td>
                                        <td>Rp. {{ number_format($i->change_money,0,',','.') }}</td>
                                        <td>{{ $i->created_at}}</td>
                                        <td><a href="{{route('printNota',$i->id)}}" class="btn btn-success"><i class="fa fa-address-book" aria-hidden="true"></i> Print Nota</a></td>
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
