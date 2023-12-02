@extends('layout.master')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css"/>
@endsection
@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Page Blank</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Pages</li>
                        <li class="breadcrumb-item active">Table Category</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card planned_task">
                    <div class="header">
                        <h2>Table Category</h2>
                    </div>
                    <div class="body">
                        <hr>
                        <table id="Tablecategory" class="display">
                            <thead>
                                <th>No</th>
                                <th>Category</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Drinks</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Food</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Example Category</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script>
    let table = new DataTable('#Tablecategory', {
        responsive: true
    });
</script>
@endsection
