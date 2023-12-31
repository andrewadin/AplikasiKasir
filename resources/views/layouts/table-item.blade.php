@extends('layout.master')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
@endsection
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                    class="fa fa-arrow-left"></i></a> Halaman Tabel Barang</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Halaman</li>
                            <li class="breadcrumb-item active">Tabel Barang</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card planned_task">
                        <div class="header">
                            <h2>Tabel Barang</h2>
                            <a href="{{ route('barang-add') }}"><button class="btn btn-primary pull-right"><i
                                        class="fa fa-plus" aria-hidden="true"></i> Tambah Barang</button></a>
                            <a href="{{route('barang-restock')}}"><button class="btn btn-primary pull-right"><i
                                        class="fa fa-plus" aria-hidden="true"></i> Re - Stock</button></a>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Kategori</th>
                                            <th>Stok</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barang as $b)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $b->item_name }}</td>
                                                <td>{{ $b->category->category }}</td>
                                                <td>{{ $b->stok }}</td>
                                                <td>Rp. {{ number_format($b->buy_price,0,',','.') }}</td>
                                                <td>Rp. {{ number_format($b->sell_price,0,',','.') }}</td>
                                                <td>
                                                    <form action="{{ route('barang-delete') }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="id" value="{{ $b->id }}">
                                                        <a href="{{ route('barang-edit', $b->id) }}"
                                                            class="btn btn-success"><i class="fa fa-pencil-square-o"
                                                                aria-hidden="true"></i>
                                                        </a>
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Apakah anda yakin untuk menghapus produk ini?')"><i
                                                                class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
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
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script>
        let table = new DataTable('#Tableitem', {
            responsive: true
        });
    </script>
@endsection
