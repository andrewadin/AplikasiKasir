@extends('layout.master')
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
                                        <th>Invoice Number</th>
                                        <th>Clients</th>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#LA-0218</td>
                                        <td>vPro Infoweb LLC.</td>
                                        <td>07 March, 2018</td>
                                        <td><img src="../assets/images/paypal.png" class="rounded width45" alt="paypal"></td>
                                        <td><span class="badge badge-success">Approved</span></td>
                                        <td>$4,205</td>
                                    </tr>
                                    <tr>
                                        <td>#LA-0220</td>
                                        <td>BT Technology</td>
                                        <td>25 Jun, 2018</td>
                                        <td><img src="../assets/images/mastercard.png" class="rounded width45" alt="mastercard"></td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                        <td>$5,205</td>
                                    </tr>
                                    <tr>
                                        <td>#LA-0222</td>
                                        <td>Core Infoweb Pvt.</td>
                                        <td>12 July, 2018</td>
                                        <td><img src="../assets/images/paypal.png" class="rounded width45" alt="paypal"></td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                        <td>$2,000</td>
                                    </tr>
                                    <tr>
                                        <td>#LA-0312</td>
                                        <td>AUR Tech LLC.</td>
                                        <td>13 July, 2018</td>
                                        <td><img src="../assets/images/paypal.png" class="rounded width45" alt="paypal"></td>
                                        <td><span class="badge badge-success">Approved</span></td>
                                        <td>$10,000</td>
                                    </tr>
                                    <tr>
                                        <td>#LA-0389</td>
                                        <td>WrapTheme Pvt.</td>
                                        <td>27 July, 2018</td>
                                        <td><img src="../assets/images/visa-card.png" class="rounded width45" alt="visa card"></td>
                                        <td><span class="badge badge-success">Approved</span></td>
                                        <td>$1,205</td>
                                    </tr>
                                    <tr>
                                        <td>#LA-0218</td>
                                        <td>vPro Infoweb LLC.</td>
                                        <td>07 March, 2018</td>
                                        <td><img src="../assets/images/paypal.png" class="rounded width45" alt="paypal"></td>
                                        <td><span class="badge badge-success">Approved</span></td>
                                        <td>$4,205</td>
                                    </tr>
                                    <tr>
                                        <td>#LA-0220</td>
                                        <td>BT Technology</td>
                                        <td>25 Jun, 2018</td>
                                        <td><img src="../assets/images/mastercard.png" class="rounded width45" alt="mastercard"></td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                        <td>$5,205</td>
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
