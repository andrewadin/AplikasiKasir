@extends('layout.k-master')
@section('title')
    Nota Pembelian
@endsection
@section('css')
<style>
    table{
        width: 70%;
        border-collapse: collapse;
        margin-left: 12%;
    }
    thead {
        display: table-row-group;
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
                            <li class="breadcrumb-item"><a href="{{ route('khome') }}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Transaksi</li>
                            <li class="breadcrumb-item active">Nota Pembelian</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card page-print">
                        <div class="header">
                            <center><span><img src="{{asset('assets/images/logo.png')}}" style="width:100%;height:100%"></span></center>
                            <p class="ftsz-sm" style="text-align: center;">
                            Alamat : Jl. Raya Ranuklindungan-Grati, Pasuruan - Jawa Timur
                            Pusat oleh-oleh dan klinik UMKM Khas Pasuruan</p>
                            <p class="ftsz-sm" style="text-align: center;">"Jagonya Selera Pasuruan"</p>
                        </div>
                        <div class="body cntr">
                            <table class="tbl ftsz">
                                <thead style="font-weight:bold;">
                                    <tr>
                                        <td>Item</td>
                                        <td>Qty</td>
                                        <td>Sub total</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($items); $i++)
                                    <tr>
                                        <td>{{ $items[$i] }}</p></td>
                                        <td>{{ $stk[$i] }}</p></td>
                                        <td>Rp. {{ $harga[$i] }}</p></td>
                                    </tr>
                                    @endfor
                                </tbody>
                                <tfoot style="font-weight:bold;">
                                    <tr>
                                        <td></td>
                                        <td>Total</td>
                                        <td>Rp. {{number_format($receipt['totalall']),0,',','.'}}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Tunai</td>
                                        <td>Rp. {{$receipt['uang_bayar']}}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Kembalian</td>
                                        <td>Rp. {{number_format($receipt['kembalian']),0,',','.'}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="footer ftsz-sm">
                                <center>
                                    <br>
                                <p><strong>Terimakasih Telah Berbelanja!</strong></p>
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
                        <a href="{{route('khome')}}" class="btn btn-secondary ">Kembali</a>
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
