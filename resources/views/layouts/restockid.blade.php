@extends('layout.master')
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
                            <h2>Stater Page</h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('restock') }}" method="post" class="form-change">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <span>Produk</span>
                                    <select name="id" id="id" class="form-control barang" required
                                        @readonly(true)>
                                        <option value="">---- Pilih Produk ---- </option>
                                        @foreach ($barang as $b)
                                            <option sell-price="{{ $b->sell_price }}" value="{{ $b->id }}"
                                                @selected($sbarang->id == $b->id)>{{ $b->item_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <span>Banyaknya yang di beli</span>
                                    <input class="form-control stk" type="number" name="stk" id="stk" required>
                                </div>
                                <div class="form-group">
                                    <span>Harga</span>
                                    <input class="form-control harga" type="number" name="harga" id="harga" readonly>
                                </div>
                                <div class="form-group">
                                    <span>Total</span>
                                    <input class="form-control total" type="number" name="total" id="total" readonly>
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
        $('form').delegate('.barang', 'change', function() {
            var harga = $('.barang').find(':selected').attr('sell-price');
            $('.harga').val(harga);
            var stk = document.getElementById("stk").value;
            var harga = document.getElementById("harga").value;
            var total = (stk * harga);
            $('.total').val(total);
        })

        $('form').delegate('.stk , .diskon', 'keyup', function() {
            var harga = $('.barang').find(':selected').attr('sell-price');
            $('.harga').val(harga);
            var stk = document.getElementById("stk").value;
            var harga = document.getElementById("harga").value;
            var total = (stk * harga);
            $('.total').val(total);
        })
    </script>
@endsection
