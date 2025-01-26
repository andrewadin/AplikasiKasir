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
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>
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
                            <h2>Restock barang</h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('restock') }}" method="post" class="form-change">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <select name="id" id="id" class="form-control barang" required
                                        style="display: none">
                                        <option value="">---- Pilih Produk ---- </option>
                                        @foreach ($barang as $b)
                                            <option value="{{ $b->id }}" item-name="{{$b->item_name}}"
                                                @selected($sbarang->id == $b->id)>{{ $b->item_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <span>Nama produk</span>
                                    <input type="text" class="form-control nama_barang @error('nama_barang') is-invalid @enderror" name="nama_barang" id="nama_barang" value="{{$sbarang['item_name']}}" required readonly>
                                    @error('nama_barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <span>Banyaknya yang di beli</span>
                                    <input class="form-control stk @error('stk') is-invalid @enderror" type="number" name="stk" id="stk" value="0">
                                    @error('stk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <span>Harga beli</span>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" style="font-size:12px;">Rp.</div>
                                        </div>
                                        <input class="form-control harga_beli @error('harga_beli') is-invalid @enderror" type="text" name="harga_beli" id="harga_beli" value="{{$sbarang['buy_price']}}" required>
                                    </div>
                                    @error('harga_beli')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    
                                </div>
                                <div class="form-group">
                                    <span>Total</span>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" style="font-size:12px;">Rp.</div>
                                        </div>
                                    <input class="form-control total @error('total') is-invalid @enderror" type="text" name="total" id="total" value="0" readonly required>
                                    </div>
                                    @error('total')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary"
                                    onclick="return confirm('Apakah anda sudah yakin ?')">Re - stock</button>
                                <a href="{{ route('barang') }}" class="btn btn-danger">Kembali</a>
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
        new AutoNumeric('#harga_beli', {
        digitGroupSeparator: ',',
        decimalPlaces: 0,
        });

        $('form').delegate('.barang', 'change', function() {
            var nama = tr.find('.id option:selected').attr('item-name');
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
