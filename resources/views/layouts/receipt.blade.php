@extends('layout.master')
@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Halaman Pengeluaran</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Laporan</li>
                        <li class="breadcrumb-item active">Pengeluaran</li>
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
                                <tbody>
                                    <tr>
                                        <td>Nama toko anda</td>
                                        <td>{{ date('Y-m-d H:i:s') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Produk yang dibeli</td>
                                        <td>
                                            @foreach ($receipt as $r)
                                                {{}}
                                            @endforeach
                                        </td>
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
