@extends('layout.master')
@section('title')
    Dashboard
@endsection
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                    class="fa fa-arrow-left"></i></a>Dashboard</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card text-center bg-info">
                        <div class="body">
                            <div class="p-15 text-light">
                                <h3>{{ $nstock }}</h3>
                                <span>Stok Kurang</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card text-center bg-secondary">
                        <div class="body">
                            <div class="p-15 text-light">
                                <h3>{{$trans}}</h3>
                                <span>Total Transaksi</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card text-center bg-success">
                        <div class="body">
                            <div class="p-15 text-light">
                                <h3>Rp. {{ number_format($income,0,',','.') }}</h3>
                                <span>Total Pendapatan</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card text-center bg-danger">
                        <div class="body">
                            <div class="p-15 text-light">
                                <h3>Rp. {{ number_format($expenses,0,',','.') }}</h3>
                                <span>Total Pengeluaran</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Laporan Statistik</h2>
                        </div>
                        <div class="body">
                            <div id="newchart">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Detail Kekurangan Stok</h2>
                        </div>
                        <div class="body team_list">
                            <div class="dd" data-plugin="nestable">
                                <ol class="dd-list">
                                    <li class="dd-item" data-id="1">
                                        <div class="dd-handle">Stok produk yang kurang</div>
                                        <div class="dd-content top_counter">
                                            <div class="content m-t-5">
                                                <h6>{{ $nstock }} Produk dengan stok yang sedikit/habis</h6>
                                            </div>
                                        </div>
                                        @foreach ($stock as $s)
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="{{ $loop->iteration }}">
                                                <div class="dd-handle">{{ $s->item_name }}</div>
                                                <div class="dd-content">
                                                    <h6 class="m-b-15">Stok tersisa : {{ $s->stok }} <a
                                                            class="btn btn-success float-right" href="{{ route('barang-restockid',$s->id)}}">Re - Stock</a></h6>
                                                </div>
                                            </li>
                                        </ol>
                                        @endforeach
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>

<script>
var mdata =  <?php echo json_encode($mdataget) ?>;
var day =  <?php echo json_encode($day) ?>;
Highcharts.chart('newchart',{
        title : {
            text : 'Penjualan di tahun <?php echo date("Y") ?>'
        },
        subtitle : {
            text : 'Hasil Penjualan di bulan <?php echo date("M") ?>'
        },
        xAxis : {
            categories : day
        },
        yAxis : {
            title : {
                text: 'Banyaknya terjadi transaksi'
            }
        },
        legend : {
            layout : 'vertical',
            align : 'right',
            verticalAlign : 'middle'
        },
        plotOption : {
            series : {
                allowPointSelect : true
            }
        },
        series : [{
            name : 'Hasil dari penjualan',
            data : mdata
        }],
        responsive : {
            rules : [{
                condition : {
                    maxWidth : 500
                },
                chartOption : {
                    legend : {
                        layout : 'horizontal',
                        align : 'center',
                        verticalAlign : 'bottom'
                    }
                }
            }]
        }
    });


    var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
</script>
@endsection
