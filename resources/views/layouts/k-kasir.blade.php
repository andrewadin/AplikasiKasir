@extends('layout.k-master')
@section('title')
    Kasir
@endsection
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                    class="fa fa-arrow-left"></i></a> Kasir</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('khome')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Kasir</li>
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
                        <form action="{{ route('kasir-kstore') }}" method="post">
                            @csrf
                            <div class="body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Produk</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Disc(%)</th>
                                            <th>Total</th>
                                            <th><a href="#" class="btn btn-success add_more"><i
                                                        class="fa fa-plus-square"></i></a></th>
                                        </tr>
                                    </thead>
                                    <tbody class="addMoreProduct">
                                        <tr>
                                            <td><select class="form-control barang" name="barang[]" id="barang">
                                                    <option value="">---- Pilih Barang ----</option>
                                                    @foreach ($barang as $b)
                                                        <option sell-price="{{ $b->sell_price }}"
                                                            value="{{ $b->id }}">{{ $b->item_name }}</option>
                                                    @endforeach
                                                </select></td>
                                            <td><input class="form-control stk" type="number" name="stk[]"
                                                    id="stk"></td>
                                            <td><input class="form-control harga" type="text" name="harga[]"
                                                    id="harga"></td>
                                            <td><input class="form-control diskon" type="number" name="diskon[]"
                                                    id="diskon" min="0" max="100" onKeyPress="if(this.value.length==3) return false;" value="0"></td>
                                            <td><input class="form-control total_item" type="text" name="total[]"
                                                    id="total_item"></td>
                                            <td><a href="#" class="btn btn-danger delete"><i
                                                        class="fa fa-minus-square"></i></a></td>
                                        </tr>
                                    </tbody>

                                </table>
                                <div class="card" style="width: 18rem;">
                                    <div class="card-header">
                                        Kotak Pembayaran
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"> Total = Rp. <b class="total" id="total"> 0</b></li>
                                        <input type="hidden" name="totalall" class="vtotal">
                                        <li class="list-group-item"> <input type="text" class="form-control uang_bayar"
                                                name="uang_bayar" id="uang_bayar" value="" placeholder="Masukkan Uang"></li>
                                        <li class="list-group-item"> Kembalian = Rp. <b class="kembalian"> 0</b></li>
                                        <input type="hidden" name="kembalian" class="vkembalian">
                                        <li class="list-group-item"><button type="submit"
                                                class="btn btn-primary" onclick="return confirm('Apakah anda yakin sudah yakin ?')">Bayar</button></li>
                                    </ul>
                                </div>

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
        $(function(){
            $('.barang').select2();
        });

        $('.add_more').on('click', function() {
            var barang = $('.barang').html();
            var numberofrow = ($('.addMoreProduct tr').length - 0) + 1;
            var tr = '<tr><td><select class="form-control barang" name="barang[]" id="barang'+numberofrow+'" >' + barang +
                ' </select></td>' +
                '<td><input type="number" name="stk[]" class="form-control stk" id="stk" ></td>' +
                '<td><input type="text" name="harga[]" class="form-control harga" id="harga"></td>' +
                '<td><input type="number" name="diskon[]" class="form-control diskon" id="diskon"  min="0" max="100" onKeyPress="if(this.value.length==3) return false;" value="0"></td>' +
                '<td><input type="text" name="total[]" class="form-control total_item" id="total_item"></td>' +
                '<td><a class="btn btn-danger delete"><i class="fa fa-minus-square"></i></a></td>'
            $('.addMoreProduct').append(tr);
            $('.barang').select2();
        });

        $('.addMoreProduct').delegate('.delete', 'click', function() {
            $(this).parent().parent().remove();
            Total();
            Kembalian();
            $('.barang').select2();
        });

        function Total() {

            var total = 0;
            $('.total_item').each(function(i, e) {
                var amount = $(this).val().replaceAll('.', '') - 0;
                total += amount;
            });
            var fixtotal = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(total).replace(',00', '').replace('Rp', '');
            $('.total').html(fixtotal);
            $('.vtotal').val(total);
        }

        $('.addMoreProduct').delegate('.barang', 'change', function() {
            var tr = $(this).parent().parent();
            var harga = tr.find('.barang option:selected').attr('sell-price');
            // var harga = $('.barang').siblings('.es-list').find('li.selected').attr('sell-price');
            var hargafix = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(harga).replace(',00', '').replace('Rp', '');
            tr.find('.harga').val(hargafix);
            var stk = tr.find('.stk').val() - 0;
            var diskon = tr.find('.diskon').val() - 0;
            var total_item = (stk * harga) - ((stk * harga * diskon) / 100);
            var totalfix = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(total_item).replace(',00', '').replace('Rp', '');
            tr.find('.total_item').val(totalfix);
            Total();
            Kembalian();
        })

        $('.addMoreProduct').delegate('.stk , .diskon , .uang_bayar', 'keyup', function() {
            var tr = $(this).parent().parent();
            var harga = tr.find('.barang option:selected').attr('sell-price');
            // var harga = $('.barang').siblings('.es-list').find('li.selected').attr('sell-price');
            // var hargafix = new Intl.NumberFormat("id-ID", {
            //     style: "currency",
            //     currency: "IDR"
            // }).format(harga).replace(',00', '').replace('Rp', '');
            var stk = tr.find('.stk').val() - 0;
            var diskon = tr.find('.diskon').val() - 0;
            var total_item = (stk * harga) - ((stk * harga * diskon) / 100);
            var totalfix = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(total_item).replace(',00', '').replace('Rp', '');
            tr.find('.total_item').val(totalfix);
            Total();
            Kembalian();
        })

        function Kembalian() {
            var total = 0;
            $('.total_item').each(function(i, e) {
                var amount = $(this).val().replaceAll('.', '') - 0;
                total += amount;
            });
            var paid = $('.uang_bayar').val().replaceAll(',', '') - 0;
            var tot = paid - total;
            var fix = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(tot).replace(',00', '').replace('Rp', '');
            $('.kembalian').html(fix);
            $('.vkembalian').val(tot);

            $('.uang_bayar').keyup(function() {
                var paid = $('.uang_bayar').val().replaceAll(',', '') - 0;
                var tot = paid - total;
                var fix = new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR"
                }).format(tot).replace(',00', '').replace('Rp', '');
                $('.kembalian').html(fix);
                $('.vkembalian').val(tot);
            })

            $('.addMoreProduct').delegate('.barang', 'change', function() {
                var paid = $('.uang_bayar').val().replaceAll(',', '') - 0;
                var tot = paid - total;
                var fix = new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR"
                }).format(tot).replace(',00', '').replace('Rp', '');
                $('.kembalian').html(fix);
                $('.vkembalian').val(tot);
            })
        }

        new AutoNumeric('#uang_bayar', {
            digitGroupSeparator: ',',
            decimalPlaces: 0,
        });

        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            alert(msg);
        }
    </script>
@endsection
