@extends('layout.master')
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                    class="fa fa-arrow-left"></i></a>Dashboard</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card text-center bg-info">
                        <div class="body">
                            <div class="p-15 text-light">
                                <h3>19</h3>
                                <span>Today Works</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card text-center bg-secondary">
                        <div class="body">
                            <div class="p-15 text-light">
                                <h3>15</h3>
                                <span>Today Tasks</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card text-center bg-warning">
                        <div class="body">
                            <div class="p-15 text-light">
                                <h3>125</h3>
                                <span>Statistics</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card text-center bg-dark">
                        <div class="body">
                            <div class="p-15 text-light">
                                <h3>318</h3>
                                <span>Analytics</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Wrok Report</h2>
                            <ul class="header-dropdown">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false"></a>
                                    <ul class="dropdown-menu dropdown-menu-right animated bounceIn">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div id="m_area_chart" class="m-b-20" style="height: 250px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Team Details</h2>
                        </div>
                        <div class="body team_list">
                            <div class="dd" data-plugin="nestable">
                                <ol class="dd-list">
                                    <li class="dd-item" data-id="1">
                                        <div class="dd-handle">Desiger</div>
                                        <div class="dd-content top_counter">
                                            <div class="icon">
                                                <img src="../assets/images/xs/avatar1.jpg" class="rounded-circle"
                                                    alt="">
                                            </div>
                                            <div class="content m-t-5">
                                                <div>UI UX Desiger</div>
                                                <h6>Tim Hank</h6>
                                            </div>
                                        </div>
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="1">
                                                <div class="dd-handle">Team Member</div>
                                                <div class="dd-content">
                                                    <h6 class="m-b-15">Info about Design Team <span
                                                            class="badge badge-success float-right">New</span></h6>
                                                    <p>It is a long established fact that a reader will be distracted by the
                                                        readable content of a page when looking at its layout.</p>
                                                    <ul class="list-unstyled team-info m-t-20 m-b-20">
                                                        <li class="m-r-15"><small class="text-muted">Team</small></li>
                                                        <li><img src="../assets/images/xs/avatar1.jpg" title="Avatar"
                                                                alt="Avatar"></li>
                                                        <li><img src="../assets/images/xs/avatar2.jpg" title="Avatar"
                                                                alt="Avatar"></li>
                                                        <li><img src="../assets/images/xs/avatar5.jpg" title="Avatar"
                                                                alt="Avatar"></li>
                                                    </ul>
                                                    <div class="progress-container l-black m-b-20">
                                                        <span class="progress-badge">Prograss</span>
                                                        <div class="progress">
                                                            <div class="progress-bar l-parpl" role="progressbar"
                                                                aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 68%;">
                                                                <span class="progress-value">68%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <small>PROJECTS: 12</small>
                                                            <h6>BUDGET: 4,870 USD</h6>
                                                        </div>
                                                        <div class="col-5">
                                                            <div class="sparkline text-right m-t-10" data-type="bar"
                                                                data-width="97%" data-height="26px" data-bar-Width="2"
                                                                data-bar-Spacing="7" data-bar-Color="#333333">
                                                                2,5,8,3,5,7,1,6</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
                                    </li>
                                    <li class="dd-item" data-id="1">
                                        <div class="dd-handle">Sales</div>
                                        <div class="dd-content top_counter">
                                            <div class="icon">
                                                <img src="../assets/images/xs/avatar2.jpg" class="rounded-circle"
                                                    alt="">
                                            </div>
                                            <div class="content m-t-5">
                                                <div>Sales Lead</div>
                                                <h6>Gary Camara</h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dd-item" data-id="1">
                                        <div class="dd-handle">Developer</div>
                                        <div class="dd-content top_counter">
                                            <div class="icon">
                                                <img src="../assets/images/xs/avatar10.jpg" class="rounded-circle"
                                                    alt="">
                                            </div>
                                            <div class="content m-t-5">
                                                <div>Project Lead</div>
                                                <h6>Fidel Tonn</h6>
                                            </div>
                                        </div>
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="1">
                                                <div class="dd-handle">FrontEnd Developer</div>
                                                <div class="dd-content">
                                                    <ul class="list-unstyled team-info">
                                                        <li><img src="../assets/images/xs/avatar5.jpg" alt="Avatar">
                                                        </li>
                                                        <li><img src="../assets/images/xs/avatar6.jpg" alt="Avatar">
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="dd-item" data-id="1">
                                                <div class="dd-handle">PHP Expert</div>
                                                <div class="dd-content">
                                                    <ul class="list-unstyled team-info">
                                                        <li><img src="../assets/images/xs/avatar7.jpg" alt="Avatar">
                                                        </li>
                                                        <li><img src="../assets/images/xs/avatar8.jpg" alt="Avatar">
                                                        </li>
                                                        <li><img src="../assets/images/xs/avatar9.jpg" alt="Avatar">
                                                        </li>
                                                        <li><img src="../assets/images/xs/avatar10.jpg" alt="Avatar">
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ol>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
