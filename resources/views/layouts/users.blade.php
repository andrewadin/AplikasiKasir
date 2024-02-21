@extends('layout.master')
@section('title')
    Tabel User
@endsection
@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Halaman Pengguna / Users</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>List</h2>
                        <ul class="header-dropdown">
                            <li><a href="{{ route('users-add') }}" class="btn btn-info">Add User</a></li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom m-b-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $u)
                                    <tr>
                                        <td>
                                            <h6 class="mb-0">{{ $u->name }}</h6>
                                            <span>{{ $u->username }}</span>
                                        </td>
                                        @if ($u->type == 'admin')
                                        <td><span class="badge badge-danger"> Admin </span></td>
                                        @else
                                        <td><span class="badge badge-success"> Kasir </span></td>
                                        @endif
                                        <td>{{ $u->created_at }}</td>
                                        <td>
                                            <form action="{{route('users-delete', $u->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $u->id }}">
                                                <a href="{{ route('users-edit', $u->id)}}"
                                                    class="btn btn-success"><i class="fa fa-pencil-square-o"
                                                        aria-hidden="true"></i> Ubah Nama dan level
                                                </a>
                                                <a href="{{ route('users-fpsw',$u->id)}}" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> Ganti Passsword</a>
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Apakah anda yakin untuk menghapus user ini?')"><i
                                                        class="fa fa-trash-o" aria-hidden="true"></i> Hapus akun
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
<script>
var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
}
</script>
@endsection
