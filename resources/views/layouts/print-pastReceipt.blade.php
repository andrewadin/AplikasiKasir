@extends('layout.master')
@section('title')
    Nota Pembelian
@endsection
@section('css')
<style>
    table{
        width: 75%;
        border-collapse: collapse;
        margin-left: 20%;
    }
    td{
        //padding: 5px 0 5px 15px;
    }
    thead{
        //padding: 5px;
        font-size: 1.5em;
    }
</style>
@endsection
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header page-screen">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                    class="fa fa-arrow-left"></i></a> Halaman Nota Pembelian</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Transaksi</li>
                            <li class="breadcrumb-item active">Nota Pembelian</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card page-print ftsz">
                        <div class="header">
                            <center><span><img src="{{asset('assets/images/logo.png')}}" style="width:50%;height:50%;"></span></center>
                            <h3 style="text-align:center;" class="ftsz">Nota Pemesanan</h3>
                            <p style="text-align:center;">Alamat : Jl. Raya Ranuklindungan-Grati, Pasuruan - Jawa Timur </br>
                            Pusat oleh-oleh dan klinik UMKM Khas Pasuruan </br>
                            "Jagonya Selera Pasuruan" </br> </p>
                        </div>
                        <div class="body">
                            <table class="tbl">
                                <thead style="font-weight:bold;">
                                    <tr>
                                        <td>Item</td>
                                        <td>Qty</td>
                                        <td>Sub total</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($histori as $h)
                                    <tr>
                                        <td>{{ $h->items->item_name }}</p></td>
                                        <td>{{ $h->qty }}</p></td>
                                        <td>Rp. {{number_format($h->total),0,',','.'}}</p></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot style="font-weight:bold;">
                                    <tr>
                                        <td></td>
                                        <td>Total</td>
                                        <td>@foreach ($histori as $h) Rp. {{number_format($h->total += $h->total),0,',','.'}} @endforeach</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Tunai</td>
                                        <td>Rp. {{number_format($h->payment),0,',','.'}}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Kembalian</td>
                                        <td>Rp. {{number_format($h->change_money),0,',','.'}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="footer">
                                <center>
                                    <br>
                                <h3><strong>Terimakasih Telah Berbelanja!</strong></h3>
                                   <p>Beli online </br>
                                    Shopee    : shopee.com/lugusranu </br>
                                    Tokopedia : tokopedia.com/lugusranu </br>
                                  </p>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-lg-12 page-screen">
                        <button type="button" class="btn btn-primary" onclick="printNota()">Cetak Nota</button>
                        <a href="{{route('pemasukan')}}" class="btn btn-secondary ">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
function printNota(){
    var element = document.getElementById("bd");
    //var table = document.getElementsByClassName("tbl");
    element.classList.add("layout-fullwidth");
    window.print();
    element.classList.remove("layout-fullwidth");
}
</script>
@endsection
