@extends('layout.master')
@section('title')
    Edit Barang
@endsection
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
                                    class="fa fa-arrow-left"></i></a> Halaman Edit Barang</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Tabel</li>
                            <li class="breadcrumb-item">Barang</li>
                            <li class="breadcrumb-item active">Edit Barang</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Edit Barang</h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" action="{{route('barang-update',$barang->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="category" id="" class="form-control" required>
                                        <option value="">---- Pilih Kategori ---- </option>
                                        @foreach ($kategori as $c)
                                        <option value="{{ $c->id }}" @selected($barang->id_category == $c->id)>{{ $c->category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Barang</label>
                                    <input type="text" name="item_name" class="form-control nama_barang @error('item_name') is-invalid @enderror" value="{{ $barang->item_name }}">
                                    @error('item_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <label for="">Harga Beli</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="font-size:12px;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control harga_barang @error('buy_price') is-invalid @enderror" name="buy_price" placeholder="Ex: 1.000" id="buy_price" value="{{ $barang->buy_price }}">
                                </div>
                                @error('buy_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="">Harga Jual</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="font-size:12px;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control harga_jual @error('sell_price') is-invalid @enderror" name="sell_price" placeholder="Ex: 1000" id="sell_price" value="{{ $barang->sell_price }}">
                                </div>
                                @error('sell_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <br>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Edit </button>
                                <a href="{{ route('barang')}}" class="btn btn-danger">Kembali</a>
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
<script>
    new AutoNumeric('#sell_price', {
        digitGroupSeparator: ',',
        decimalPlaces: 0,
    });

    new AutoNumeric('#buy_price', {
        digitGroupSeparator: ',',
        decimalPlaces: 0,
    });

</script>
@endsection
