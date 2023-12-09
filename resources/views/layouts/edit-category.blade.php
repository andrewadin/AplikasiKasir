@extends('layout.master')
@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/parsleyjs/css/parsley.css')}}">
@endsection
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                    class="fa fa-arrow-left"></i></a> Page Blank</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">Page Blank</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Edit kategori</h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" action="{{ route('kategori-update',$kategori->id) }}">
                                @csrf
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <input type="text" class="form-control" placeholder="Masukkkan nama kategori" name="category" value="{{ $kategori->category }}" required>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Simpan</button>
                                <a href="{{ route('kategori')}}" class="btn btn-danger">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
<script src="{{asset('assets/vendor/parsleyjs/js/parsley.min.js')}}"></script>
@endsection
