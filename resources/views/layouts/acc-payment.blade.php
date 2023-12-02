@extends('layout.master')
@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css')}}">
@endsection
@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Page Payment</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Pages</li>
                        <li class="breadcrumb-item active">Payment</li>
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
                                        <th>ID</th>
                                        <th>Clients Name</th>
                                        <th>Project Name</th>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>LA 0218</td>
                                        <td>WrapTheme</td>
                                        <td>Alpino - Bootstrap 4 </td>
                                        <td>07 March, 2018</td>
                                        <td><img src="../assets/images/paypal.png" class="rounded width45" alt="paypal"></td>
                                        <td>$4,205</td>
                                    </tr>
                                    <tr>
                                        <td>LA 0220</td>
                                        <td>ThemeMakker</td>
                                        <td>Nexa Wordpress</td>
                                        <td>25 Jun, 2018</td>
                                        <td><img src="../assets/images/mastercard.png" class="rounded width45" alt="mastercard"></td>
                                        <td>$5,205</td>
                                    </tr>
                                    <tr>
                                        <td>LA 0222</td>
                                        <td>WrapTheme</td>
                                        <td>Lucid HR Management</td>
                                        <td>12 July, 2018</td>
                                        <td><img src="../assets/images/paypal.png" class="rounded width45" alt="paypal"></td>
                                        <td>$2,000</td>
                                    </tr>
                                    <tr>
                                        <td>LA 0312</td>
                                        <td>WrapTheme</td>
                                        <td>sQuare - Bootstrap 4 Angular5 Admin</td>
                                        <td>13 July, 2018</td>
                                        <td><img src="../assets/images/paypal.png" class="rounded width45" alt="paypal"></td>
                                        <td>$10,000</td>
                                    </tr>
                                    <tr>
                                        <td>LA 0389</td>
                                        <td>WrapTheme</td>
                                        <td>Compass Dashboard</td>
                                        <td>27 July, 2018</td>
                                        <td><img src="../assets/images/visa-card.png" class="rounded width45" alt="visa card"></td>
                                        <td>$1,205</td>
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
<script src="{{asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.print.min.js')}}"></script>

@endsection
