@extends('layout.master')
@section('title', 'Dashboard')
@section('content')
<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title text-capitalize">{{ Auth::user()->user_type }}</h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboardss</a></li>
                                <li class="breadcrumb-item active" aria-current="page">E-Commerce Dashboard Template
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->
        <div class="ecommerce-widget">
            <div class="container-fluid">


                <div class="row">
                    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-muted">Active Users</h3>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">{{ count($no_users) }}</h1>
                                </div>
                            </div>
                            <div id="sparkline-revenue"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card ">
                            <div class="card-body">
                                <h3 class="text-muted">Super Admins</h3>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">{{ count($no_super) }}</h1>
                                </div>
                            </div>
                            <div id="sparkline-revenue"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-muted">Admin</h3>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">{{ count($no_admin) }}</h1>
                                </div>
                            </div>
                            <div id="sparkline-revenue"></div>
                        </div>
                    </div>

                </div>



                <div class="row">


                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h2 class="card-title">Most Viewed Category</h2>
                        <div class="card" style="width: 30rem;">
                            @if (sizeof($allmax) > 0 )
                            @foreach ($allmax as $mostviewed)

                            <img src="{{$mostviewed->thumbnail}}" class="card-img-top img-fluid" style="height: 20rem;" alt="image">
                            <div class="card-body">

                                <h3 class="card-text text-capitalize">{{ $mostviewed->title }}</h3>
                            </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item text-capitalize">
                                    Description : {{ $mostviewed->description }}
                                </li>
                                <li class="list-group-item">Views: {{ $viewed }}</li>

                            </ul>

                            @endforeach
                            @else
                            <img src="..." class="card-img-top img-fluid" style="height: 20rem;" alt="image">
                            <div class="card-body">

                                <h3 class="card-text text-capitalize">Title</h3>
                            </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item text-capitalize">
                                    Description
                                </li>
                                <li class="list-group-item">Views</li>

                            </ul>
                            @endif

                        </div>
                    </div>



                </div>
                <!-- Charts -->

                <div class="row">


                    <div class="col-12">
                        <h2 class="pageheader-title text-capitalize">Chart</h2>
                        <div class="card">

                            <div class="card-body">
                                <canvas id="myChart" height="280" width="600"></canvas>
                            </div>

                        </div>
                    </div>


                </div>
                <!-- Charts End -->
            </div>

        </div>
    </div>
</div>
<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="text-md-right footer-links d-none d-sm-block">
                    <a href="javascript: void(0);">About</a>
                    <a href="javascript: void(0);">Support</a>
                    <a href="javascript: void(0);">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection