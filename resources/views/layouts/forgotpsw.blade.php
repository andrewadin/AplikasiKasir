@extends('layout.master')
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                    class="fa fa-arrow-left"></i></a> Halaman Lupa Password</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">User</li>
                            <li class="breadcrumb-item active">Lupa Password</li>
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
                            <form action="{{ route('users-cpsw', $users->id) }}" method="post">
                                @csrf
                                @method('PUT')
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
