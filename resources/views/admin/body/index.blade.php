
@extends('admin.home')
@section('home_admin')

@php

$date = date('d-m-y');
$day = App\Models\Order::where('order_date',$date)->sum('amount');

$months = date('F');
$month = App\Models\Order::where('order_month',$months)->sum('amount');

$years = date('Y');
$year = App\Models\Order::where('order_year',$years)->sum('amount');

    $pending =App\Models\Order::where('status','pending')->get();
@endphp
<div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard  </h1>

                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </div>

                    <div class="row mb-3">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Earnings (Dayly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$day }} $</div>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Annual) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Earning (Month)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$month}} $</div>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-shopping-cart fa-2x text-success"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- New User Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Earning Year</div>
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$year}} $</div>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-info"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pending Total</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($pending)}}</div>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-warning"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- Area Chart -->

                        <!-- Invoice Example -->
                        <div class="row">
        <div class="col-12 " >
            <div class="col-lg-12">
                <div class="card mb-4" >
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">State Pending List</h6>
                    </div>
                    <div class="table-responsive p-3" style="border-radius:10px">
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        @php($id=0)
                        <thead class="thead-light">
                                <tr>
                                    <th>STT</th>
                                    <th>Date</th>
                                    <th>Invoice </th>
                                    <th>Amout</th>
                                    <th>Payment</th>
                                    <th>Status </th>
                                    <th>Action </th>

                                </tr>
                            </thead>

                            <tbody>
                            @foreach($pending as $key)
                                <tr>
                                    <td>{{$id++}}</td>
                                    <td>{{$key->order_date}}</td>
                                    <td>{{$key->invoice_no}}</td>
                                    <td>{{$key->amount}}</td>
                                    <td>{{$key->payment_method}}</td>
                                    <td class="badge badge-warning" style="margin-top: 10px;">{{$key->status}}</td>
                                    <td>
                                        <div class="btn btn-info"><a class="abrands" href="{{route('detail.order.admin',$key->id)}}">View</a></div>
                                        <div  class="btn btn-danger "><a class="abrands deleted" href="{{route('download.admin',$key->id)}}"><i class="fas fa-download"></i></a></div>
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
                        <!-- Message From Customer-->

                   
                    <!--Row-->

                    <!-- Modal Logout -->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to logout?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                    <a href="login.html" class="btn btn-primary">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
@endsection
