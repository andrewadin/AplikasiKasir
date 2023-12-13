<!doctype html>
<html lang="en">

<head>
<title>:: Lucid HR :: File Dashboard</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Lucid Bootstrap 4x Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/morrisjs/morris.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/vendor/nestable/jquery-nestable.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css')}}">

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/color_skins.css')}}">
@yield('css')
</head>

<body class="theme-cyan">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="{{asset('assets/images/logo-icon.svg')}}" width="48" height="48" alt="Lucid"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div id="wrapper">
    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
            </div>

            <div class="navbar-brand">
                <a href="index.html"><img src="{{asset('assets/images/logo.svg')}}" alt="Lucid Logo" class="img-responsive logo"></a>
            </div>

            <div class="navbar-right">
                <div id="navbar-menu">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('logout') }}" class="icon-menu" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="icon-login"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div id="left-sidebar" class="sidebar">
        <div class="sidebar-scroll">
            <div class="user-account">
                <img src="{{asset('assets/images/user.png')}}" class="rounded-circle user-photo" alt="User Profile Picture">
                <div class="dropdown">
                    <span>Selamat Datang,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ Auth::user()->name }}</strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account animated flipInY">
                        <li><a href="#"><i class="icon-user"></i>Profilku</a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="icon-power"></i>Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>
            </div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#hr_menu">Halaman</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#setting"><i class="icon-settings"></i></a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content p-l-0 p-r-0">
                <div class="tab-pane animated fadeIn active" id="hr_menu">
                    <nav class="sidebar-nav">
                        <ul class="main-menu metismenu">
                            <li><a href="{{ route('home') }}"><i class="icon-speedometer"></i><span>Dasbor</span></a></li>
                            <li><a href="/blank"><i class="icon-list" aria-hidden="true"></i>
                                Halaman Blank</a></li>
                            <li>
                            <li><a href="{{ route('kasir') }}"><i class="fa fa-money" aria-hidden="true"></i>
                                Halaman Kasir</a></li>
                            <li>
                                <a href="#Employees" class="has-arrow"><i class="icon-users"></i><span>Tabel</span></a>
                                <ul>
                                    <li><a href="{{ route('kategori') }}">Kategori</a></li>
                                    <li><a href="{{ route('barang') }}">Barang</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#Report" class="has-arrow"><i class="icon-bar-chart"></i><span>Laporan</span></a>
                                <ul>
                                    <li><a href="{{ route('pengeluaran') }}">Pengeluaran</a></li>
                                    <li><a href="{{ route('pemasukan') }}">Pemasukan</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('users') }}"><i class="icon-user"></i>Pengguna / User</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="tab-pane animated fadeIn" id="setting">
                    <div class="p-l-15 p-r-15">
                        <h6>Pilih Warna</h6>
                        <ul class="choose-skin list-unstyled">
                            <li data-theme="purple">
                                <div class="purple"></div>
                                <span>Purple</span>
                            </li>
                            <li data-theme="blue">
                                <div class="blue"></div>
                                <span>Blue</span>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan"></div>
                                <span>Cyan</span>
                            </li>
                            <li data-theme="green">
                                <div class="green"></div>
                                <span>Green</span>
                            </li>
                            <li data-theme="orange" class="active">
                                <div class="orange"></div>
                                <span>Orange</span>
                            </li>
                            <li data-theme="blush">
                                <div class="blush"></div>
                                <span>Blush</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('content')
</div>

<!-- Javascript -->
<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('assets/vendor/autoNumeric/src/AutoNumeric.js')}}"></script>

<script src="{{asset('assets/vendor/toastr/toastr.js')}}"></script>
<script src="{{asset('assets/vendor/toastr/toastr.js')}}"></script>
<script src="{{asset('assets/bundles/knob.bundle.js')}}"></script> <!-- Jquery Knob-->
<script src="{{asset('assets/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{asset('assets/bundles/morrisscripts.bundle.js')}}"></script><!-- Morris Plugin Js -->
<script src="{{asset('assets/vendor/nestable/jquery.nestable.min.js')}}"></script> <!-- Jquery Nestable -->

<script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/ui/sortable-nestable.js')}}"></script>
<script src="{{asset('assets/js/index2.js')}}"></script>
<script src="{{asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
@yield('script')
</body>
