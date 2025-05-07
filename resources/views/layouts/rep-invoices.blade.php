@extends('layout.master')
@section('title')
    Laporan Pemasukan
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="{{asset('assets/vendor/sweetalert/sweetalert.css')}}"/>
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
                        <li class="breadcrumb-item active">{{$rekap}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        Data Pemasukan {{$rekap}} Pembelian {{$tanggal}}
                        @isset($filter)
                        {{$filter}}
                        @else
                        {{$now}}
                        @endisset 
                    </div>
                    <div class="body">
                        @if ($rekap == 'Harian')
                            <form action="{{ route('filtered-harian')}}" method="get">
                                @csrf
                                <div class="form-group">
                                    <label for="">Filter Tanggal</label>
                                    <div class="input-group">
                                        <div class="input-group-filtered">
                                            <span class="input-group-text"><i class="icon-calendar"></i></span>
                                        </div>
                                        <input data-provide="datepicker" id="filter_tgl" name="filter_tgl" data-date-autoclose="false" class="form-control datepicker" placeholder="Tanggal Transaksi">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @elseif($rekap == 'Bulanan')
                        <form action="{{route('filtered-bulanan')}}" method="get">
                            @csrf
                            <div class="form-group">
                                <label for="">Filter Bulan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-calendar"></i></span>
                                    </div>
                                    <select name="bulan" id="bulan" class="form-control">
                                        <option selected disabled>Pilih Bulan Transaksi</option>
                                    @for ($x = 1; $x < 13; $x++)
                                        <option value="{{$x}}">{{$bulan[$x-1]}}</option>
                                    @endfor
                                    </select>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @elseif($rekap == 'Tahunan')
                        <form action="{{route('filtered-tahunan')}}" method="get">
                            @csrf
                            <div class="form-group">
                                <label for="">Filter Tahun</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-calendar"></i></span>
                                    </div>
                                    <select name="tahun" id="tahun" class="form-control">
                                        <option selected disabled>Pilih Tahun Transaksi</option>
                                    @for ($x = 0; $x < count($tahun); $x++)
                                        <option value="{{$tahun[$x]}}">{{$tahun[$x]}}</option>
                                    @endfor
                                    </select>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-hover dataTable js-exportable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Kuantitas</th>
                                        <th>Total</th>
                                        <th>Uang Bayar</th>
                                        <th>Kembalian</th>
                                        <th>Tanggal Pembelian</th>
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
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
		
<script src="{{asset('assets/js/bootstrap-datepicker.id.min.js')}}" charset="UTF-8"></script>

<script src="{{asset('assets/vendor/sweetalert/sweetalert.min.js')}}"></script> 
@if($rekap == 'Harian')
<script>
    $('.datepicker').datepicker({
        language: "id",
        format: 'yyyy-mm-dd',
        todayHighlight: true
    });
</script>
@endif
@endsection
