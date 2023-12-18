@extends('layout.master')
@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Page Blank</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Halaman</li>
                        <li class="breadcrumb-item active">Halaman Kasir</li>
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
                    <div class="body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Disc(%)</th>
                                <th>Total</th>
                                <th><a href="#" class="btn btn-success add_more"><i class="fa fa-plus-square"></i></a></th>
                            </tr>
                        </thead>
                        <tbody class="addMoreProduct">
                            <form action="" method="post">
                                @csrf
                                <tr>
                                    <td><select class="form-control barang" name="barang[]" id="barang">
                                        <option value="">---- Pilih Barang ----</option>
                                        @foreach ($barang as $b)
                                            <option sell-price="{{ $b->sell_price }}" value="{{$b->id}}">{{$b->item_name}}</option>
                                        @endforeach
                                    </select></td>
                                    <td><input class="form-control stk" type="number" name="stk[]" id="stk"></td>
                                    <td><input class="form-control harga" type="number" name="harga[]" id="harga" readonly></td>
                                    <td><input class="form-control diskon" type="number" name="diskon[]" id="diskon"></td>
                                    <td><input class="form-control total_item" type="number" name="total[]" id="total" readonly></td>
                                    <td><a href="#" class="btn btn-danger delete"><i class="fa fa-minus-square"></i></a></td>
                                </tr>
                            </form>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Produk</td>
                                <td>Jumlah</td>
                                <td>Harga</td>
                                <td>Disc</td>
                                <td> Total = <b class="total"> 0.00</b></td>
                            </tr>
                        </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $('.add_more').on('click', function(){
            var barang = $('.barang').html();
            var numberofrow = ($('.addMoreProduct tr').length - 0) + 1;
            var tr = '<tr><td><select class ="form-control barang" name="barang[]" >'+ barang + ' </select></td>' +
                '<td><input type="number" name="stk[]" class="form-control stk"></td>' +
                '<td><input type="number" name="harga[]" class="form-control harga" readonly></td>' +
                '<td><input type="number" name="diskon[]" class="form-control diskon"></td>' +
                '<td><input type="number" name="total[]" class="form-control total_item" readonly></td>' +
                '<td><a class="btn btn-danger delete"><i class="fa fa-minus-square"></i></a></td>'
                $('.addMoreProduct').append(tr);
        });

        $('.addMoreProduct').delegate('.delete', 'click', function(){
            $(this).parent().parent().remove();
            Total();
        });

        function Total(){
            var total = 0;
            $('.total_item').each(function(i, e){
                var amount = $(this).val() - 0;
                total += amount;
            });

            $('.total').html(total);
        }

        $('.addMoreProduct').delegate('.barang','change',function(){
            var tr = $(this).parent().parent();
            var harga = tr.find('.barang option:selected').attr('sell-price');
            tr.find('.harga').val(harga);
            var stk = tr.find('.stk').val() - 0;
            var diskon = tr.find('.diskon').val() - 0;
            var harga = tr.find('.harga').val() - 0;
            var total_item = (stk * harga) - ((stk * harga * diskon) / 100);
            tr.find('.total_item').val(total_item);
            Total();
        })

        $('.addMoreProduct').delegate('.stk , .diskon', 'keyup', function(){
            var tr = $(this).parent().parent();
            var harga = tr.find('.barang option:selected').attr('sell-price');
            tr.find('.harga').val(harga);
            var stk = tr.find('.stk').val() - 0;
            var diskon = tr.find('.diskon').val() - 0;
            var harga = tr.find('.harga').val() - 0;
            var total_item = (stk * harga) - ((stk * harga * diskon) / 100);
            tr.find('.total_item').val(total_item);
            Total();
        })
    </script>
@endsection
