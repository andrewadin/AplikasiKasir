@extends('layout.master')
@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Page Blank</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Halaman</li>
                        <li class="breadcrumb-item active">Halaman Kasir</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card planned_task">
                    <div class="header">
                        <h2>Halaman Kasir</h2>
                    </div>
                    <div class="body">
                        <table class="table table-striped">
                            <tr>
                                <th>Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Disc(%)</th>
                                <th>Total</th>
                                <th><i class="fa fa-plus-square" style="color: #56d754;"></i></th>
                            </tr>
                            <form action="" method="post">
                                @csrf
                                <tr>
                                    <td><select class="form-control" name="" id="exampleFormControlSelect1">
                                        <option value="">Test 1</option>
                                        <option value="">Test 2</option>
                                        <option value="">Test 3</option>
                                    </select></td>
                                    <td><input class="form-control" type="number" name="" id=""></td>
                                    <td><input class="form-control" type="number" name="" id=""></td>
                                    <td><input class="form-control" name="" id=""></td>
                                    <td><input class="form-control" name="" id=""></td>
                                    <td><i class="fa fa-minus-square" style="color:#BE3144;"></i></td>
                                </tr>
                            </form>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
