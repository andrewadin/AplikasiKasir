@extends('layout.k-master')
@section('title')
    Invoice
@endsection
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                    class="fa fa-arrow-left"></i></a> Halaman Invoice</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('khome') }}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Invoice</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <a class="btn btn-primary pull-right" href="{{ route('khome')}}">Kembali Ke Kasir</a>
                            <div class="table-responsive">
                                <table class="table table-borderless table-hover" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Kuantitas</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < count($items); $i++)
                                            <tr>
                                                <td>
                                                    {{ $items[$i] }}
                                                </td>
                                                <td>
                                                    Rp.{{ $harga[$i] }}
                                                </td>
                                                <td>
                                                    {{ $stks[$i] }}
                                                </td>
                                                <td>
                                                    Rp. {{ $total[$i] }}
                                                </td>
                                            </tr>
                                        @endfor
                                        <tr>
                                            <td>Grand Total</td>
                                            <td></td>
                                            <td></td>
                                            <td>Rp. {{ number_format($receipt['totalall'], 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Uang yang dibayar</td>
                                            <td></td>
                                            <td></td>
                                            <td>Rp. {{ number_format(str_replace(',', '', $receipt['uang_bayar']), 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kembalian</td>
                                            <td></td>
                                            <td></td>
                                            <td>Rp. {{ number_format(str_replace(',', '', $receipt['kembalian']), 0, ',', '.') }}</td>
                                        </tr>
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
    <script>
        $('#dataTable').dataTable( {
            "paging": false,
            "ordering": false,
            dom: 'Bfrtip',
            buttons: [
            {
                extend: 'print',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '25pt' );

                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
            }
        ]
        } );
    </script>
@endsection
