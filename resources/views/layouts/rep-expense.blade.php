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
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Page Invoice</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Pages</li>
                        <li class="breadcrumb-item active">Invoice</li>
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
                                        <th>Item</th>
                                        <th>Order by</th>
                                        <th>From</th>
                                        <th>Date</th>
                                        <th>Paid By</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>HP Computer</td>
                                        <td>Marshall Nichols</td>
                                        <td>Amazon</td>
                                        <td>07 March, 2018</td>
                                        <td><img src="../assets/images/paypal.png" class="rounded width45" alt="paypal"></td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                        <td>$205</td>
                                    </tr>
                                    <tr>
                                        <td>MacBook Pro</td>
                                        <td>Debra Stewart</td>
                                        <td>Amazon</td>
                                        <td>17 Jun, 2018</td>
                                        <td><img src="../assets/images/mastercard.png" class="rounded width45" alt="paypal"></td>
                                        <td><span class="badge badge-success">Approved</span></td>
                                        <td>$800</td>
                                    </tr>
                                    <tr>
                                        <td>Dell Monitor 22 inch</td>
                                        <td>Ava Alexander</td>
                                        <td>Flipkart India</td>
                                        <td>21 Jun, 2018</td>
                                        <td><img src="../assets/images/mastercard.png" class="rounded width45" alt="paypal"></td>
                                        <td><span class="badge badge-success">Approved</span></td>
                                        <td>$205</td>
                                    </tr>
                                    <tr>
                                        <td>Zebronics Desktop</td>
                                        <td>Marshall Nichols</td>
                                        <td>ebay UK</td>
                                        <td>22 July, 2018</td>
                                        <td><img src="../assets/images/paypal.png" class="rounded width45" alt="paypal"></td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                        <td>$355</td>
                                    </tr>
                                    <tr>
                                        <td>Logitech USB Mouse, Keyboard</td>
                                        <td>Marshall Nichols</td>
                                        <td>Amazon</td>
                                        <td>28 July, 2018</td>
                                        <td><img src="../assets/images/paypal.png" class="rounded width45" alt="paypal"></td>
                                        <td><span class="badge badge-success">Approved</span></td>
                                        <td>$40</td>
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
