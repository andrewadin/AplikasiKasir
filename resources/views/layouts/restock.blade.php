@extends('layout.master')
@section('title')
    Restock
@endsection
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                    class="fa fa-arrow-left"></i></a> Halaman Restock Barang</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Tabel</li>
                            <li class="breadcrumb-item">Barang</li>
                            <li class="breadcrumb-item active">Restock Barang</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card planned_task">
                        <div class="header">
                            <h2>Stater Page</h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('restock') }}" method="post" class="form-change">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <span>Produk</span>
                                    <select name="id" id="id" class="form-control barang" required>
                                        <option value="">---- Pilih Produk ---- </option>
                                        @foreach ($barang as $b)
                                        <option item_name="{{ $b->item_name }}" value="{{ $b->id }}">{{ $b->item_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <span> Nama barang </span>
                                    <input type="text" class="form-control nama_barang" name="nama_barang" required>
                                </div>
                                <div class="form-group">
                                    <span>Banyaknya yang di beli</span>
                                    <input class="form-control stk" type="number" name="stk" id="stk" required>
                                </div>
                                <div class="form-group">
                                    <span> Harga Beli </span>
                                    <input class="form-control harga_beli" type="text" name="harga_beli" id="harga_beli" required>
                                </div>
                                <div class="form-group">
                                    <span> Harga Jual </span>
                                    <input type="text" class="form-control harga_jual" name="harga_jual" id="harga_jual" required>
                                </div>
                                <div class="form-group">
                                    <span>Total</span>
                                    <input class="form-control total" type="text" name="total" id="total" required>
                                </div>
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda sudah yakin ?')">Re - stock</button>
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
    <script>
        new AutoNumeric('#harga_jual', {
        digitGroupSeparator: ',',
        decimalPlaces: 0,
        });

        new AutoNumeric('#harga_beli', {
        digitGroupSeparator: ',',
        decimalPlaces: 0,
        });

        $('form').delegate('.barang', 'change', function() {
            var nama = tr.find('.barang option:selected').attr('item_name');
            tr.find('.nama_barang').val(nama);
            var harga = $('.harga_beli').val().replaceAll(',','') - 0;
            var stk = document.getElementById("stk").value;
            var total = (stk * harga);
            var totalfix = new Intl.NumberFormat("id-ID",{
                                style : "currency",
                                currency : "IDR"
                            }).format(total).replace(',00','').replace('Rp','');
            $('.total').val(totalfix);
        })

        $('form').delegate('.stk , .harga_beli', 'keyup', function() {
            var harga = $('.harga_beli').val().replaceAll(',','') - 0;
            var stk = document.getElementById("stk").value;
            var total = (stk * harga);
            var totalfix = new Intl.NumberFormat("id-ID",{
                                style : "currency",
                                currency : "IDR"
                            }).format(total).replace(',00','').replace('Rp','');
            $('.total').val(totalfix);
        })
    </script>
@endsection
