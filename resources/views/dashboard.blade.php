@extends('layout.master')
@section('title', 'Dashboard')
@section('content')
<style>
.card{
    padding: 15px 0px;
}

.card-body{
    padding:0px;
}

.metric-value{
/*display: flex;*/
/*flex-grow: 1;*/
}

.card-body h3{
    font-size:14px;
    font-weight:700;
    margin-bottom:15px;
}
.metric-value h4,.metric-value h1{
    width: 50%;
    text-align: left;
    font-family:"Oswald";
    padding: 0px 0px;
    
}

.chart-header{
    overflow: hidden;
    margin-bottom: 20px
}

.chart-header .title{
    float: left;
    font-size:14px;
    font-weight:700;
    margin-bottom:0px;
}
.toggles,.date-range{
    margin-bottom: 20px;
}
.chart-header #chartOptions{
    float: right;
    width: 150px;
    height: auto;
    padding: 0px;
    text-align: right;
    border: none !important;
    box-sizing: unset !important;
}

.toggle{
    border-radius: 100px;
    width: 33px;
    height: 20px;
    background: none;
    --webkit-appearance: none;
    appearance: none;
    position: relative;
    border: 1px solid #818FA6;
    cursor: pointer;
    float: left;
    margin-right: 10px;
}

.toggle::before{
    content: "";
}

.toggle.active:checked{
    background: #CA3C25;
    border-color: #CA3C25;
}

.toggle.watched:checked{
    background: #1E555C;
    border-color: #1E555C;
}

.toggle::after{
content:"";
width: 17px;
height: 17px;
position: absolute;
border-radius:50%;
top:0px;
left: 0px;
background:#818FA6;
}

.toggle:checked::after{
    background: #fff;
    right: 0px;
    left: unset;
    transition: 1s;
    
}

.toggle-btn{
    display: inline-block;
    margin-right: 15px;
}
/*.metric-value h4{*/
/*    border: 2px solid rgb(152,192,183);*/
/*}*/

td,th{
    background:none !important;
    border:none !important;
}

.table{
    table-layout: fixed;
}
</style>
<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->
        <div class="ecommerce-widget">
            <div class="container-fluid">
            <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                
                                <h2 class="pageheader-title text-capitalize">{{ Auth::user()->user_type }}</h2>
            
                                {{-- <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboards</a></li>
                                        </ol>
                                    </nav>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                <div class="row">
                    <div class="col-md-3 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class=" card-title">Active Users</h3>
                                <div class="metric-value">
                                    <h1 class="mb-1" >{{ count($no_users) }} </h1>
                                    <!--<h4>{{ $activePercentage }}%</h4>-->
                                </div>
                            </div>
                            <div id="sparkline-revenue"></div>
                        </div>
                    </div>
                    <div class=" col-md-3 col-sm-12 col-12">
                        <div class="card ">
                            <div class="card-body">
                                <h3 class="">Watch Time (Hrs)</h3>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">{{ $views->count() }}</h1>
                                </div>
                            </div>
                            <div id="sparkline-revenue"></div>
                        </div>
                    </div>
                    {{-- <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-muted">Admin</h3>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">{{ count($no_admin) }}</h1>
                                </div>
                            </div>
                            <div id="sparkline-revenue"></div>
                        </div>
                    </div> --}}
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="chart-header">
                                    <h1 class="title">
                                        Chart
                                    </h1>
                                    <select class="form-control input-sm" id="chartOptions" onchange="setChart(this.value)">
                                        <option value="daily">Daily</option>
                                        <option value="weekly">Weekly</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="range">Range</option>
                                    </select>
                                </div>
                                <div class="row date-range" style="display:none;">
                                    <div class="col-md-5">
                                        <label>Start Date</label>
                                        <input type="date" class="form-control start_date">
                                    </div>
                                    <div class="col-md-5">
                                        <label>End Date</label>
                                        <input type="date" class="form-control end_date">
                                    </div>
                                    <div class="col-md-2" style="padding: 0px;align-self: end;">
                                        <button class="btn btn-info btn-block" style="padding: 7px 0px;" onclick="displayRange()">Set</button>
                                    </div>
                                    <div class="col-md-12">
                                        <span class="text-danger error_message"></span>
                                    </div>
                                </div>
                                <div class="toggles">
                                        <div class="toggle-btn">
                                            <input type="checkbox" class="toggle  active" checked> <label>Active Users</label>
                                        </div>
                                        <div class="toggle-btn">
                                            <input type="checkbox" class="toggle watched" checked> <label>Watched Time</label>
                                        </div>
                                </div>
                                
                                <div class="card-body">
                                    <canvas id="myChart" height="350" width="600"></canvas>
                                </div>
    
                            </div>
                        </div>

                </div>



                <div class="row">


                    <div class=" col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h2 class="card-title">Most Viewed Category</h2>
                        <div class="card-body" style="width: 100%;">
                            <table class="table">
                                <tr>
                                    <th>SN</th>
                                    <th>Categories</th>
                                    <th>WatchTime</th>
                                    <th>Views</th>
                                </tr>
                            <?php
                            $i = 1;
                            ?>
                            @foreach ($categories as $category)

                            <tr>
                                <td><?=$i?></td>
                                <td><?=$category->name?></td>
                                <td><?= round($category->views_sum_time / 3600,3)?> Hours</td>
                                <td><?=$category->views_count?> Views</td>
                            </tr>
                            <?php $i++;?>
                            @endforeach
                         </table>

                        </div>
                        </div>
                        
                    </div>



                </div>
                <!-- Charts -->
                <div class="row">


                    <div class=" col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h2 class="card-title">Most Viewed Videos</h2>
                        <div class="card-body" style="width: 100%;">
                            <table class="table">
                                <tr>
                                    <th>SN</th>
                                    <th>Title</th>
                                    <th>WatchTime</th>
                                    <th>Views</th>
                                </tr>
                            <?php
                            $i = 1;
                            ?>
                            @foreach ($videos as $video)

                            <tr>
                                <td><?=$i?></td>
                                <td><?=$video->title?></td>
                                <td><?=round($video->views_sum_time / 3600,3)?> Hours</td>
                                <td><?=$video->views_count?> Views</td>
                            </tr>
                            <?php $i++;?>
                            @endforeach
                         </table>

                        </div>
                        </div>
                        
                    </div>



                </div>
                
                <!-- Charts End -->
            </div>

        </div>
    </div>
</div>
{{-- <div class="footer">
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
</div> --}}

@endsection