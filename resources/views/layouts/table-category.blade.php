@extends('layout.master')
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                    class="fa fa-arrow-left"></i></a> Halaman Tabel Kategori</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">Tabel Kategori</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card planned_task">
                        <div class="header">
                            <a href="{{route('kategori-add')}}"><button type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"
                                    aria-hidden="true"></i>
                                Tambah Kategori Baru</button></a>
                            <h2>Tabel Kategori</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kategori as $k)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $k->category }}</td>
                                                <td>
                                                    <a href="{{route('kategori-edit',$k->id)}}" class="btn btn-success"><i class="fa fa-pencil-square-o"
                                                            aria-hidden="true"></i>
                                                    </a>
                                                    <a href="{{route('kategori-delete',$k->id)}}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus kategori ini?')"><i class="fa fa-trash-o"
                                                            aria-hidden="true"></i>
                                                    </a>
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
