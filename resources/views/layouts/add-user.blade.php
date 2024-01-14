@extends('layout.master')
@section('title')
    Tambah User
@endsection
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                    class="fa fa-arrow-left"></i></a> Halaman Tambah User</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">User</li>
                            <li class="breadcrumb-item active">Tambah User</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card planned_task">
                        <div class="header">
                            <h2>Tambah User</h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('users-store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <span>Nama user</span>
                                    <input type="text" name="name" id="name"
                                        class="form-control  @error('name') is-invalid @enderror">
                                </div>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-group">
                                    <span>Username</span>
                                    <input type="text" name="username" id="username"
                                        class="form-control  @error('username') is-invalid @enderror">
                                </div>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-group">
                                    <span>Password</span>
                                    <input type="password" name="password" id="password"
                                        class="form-control  @error('password') is-invalid @enderror">
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-group">
                                    <span>Confirm password</span>
                                    <input type="password" name="password_confirmation" id="password-confirm"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <span>Role user</span>
                                    <select name="type" id="type"
                                        class="form-control  @error('type') is-invalid @enderror">
                                        <option value="0">Admin</option>
                                        <option value="1">Kasir</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <a class="btn btn-danger" href="{{ route('users') }}"> Back </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
