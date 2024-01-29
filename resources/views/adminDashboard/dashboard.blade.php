@extends('adminDashboard.layouts.master')
@section('css')

@section('title')
    Admin Dashboard
        @stop
        @endsection
        @section('page-header')
        <br>     <!-- breadcrumb -->
        @section('PageTitle')
        Admin Dashboard
@stop
<!-- breadcrumb -->
@endsection
@section('content')

        <!-- widgets -->
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                        <span class="text-danger">
                                            <i class="fa fa-male highlight-icon" aria-hidden="true"></i>
                                        </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">Customer</p>
                                <h4>{{App\Models\Customer::count()}}</h4>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                        <span class="text-danger">
                                            <i class="fa fa-folder highlight-icon" aria-hidden="true"></i>
                                        </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">categories</p>
                                <h4><span>Count = </span>{{ $categories }}</h4>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <span class="text-danger">
                                    <i class="fa fa-shopping-bag  highlight-icon" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">products</p>
                                <h4><span>Count = </span>{{ $products }}</h4>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                        <span class="text-danger">
                                            <i class="fa fa-shopping-cart highlight-icon" aria-hidden="true"></i>
                                        </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">Orders</p>
                                <h4><span>Count = </span>{{ App\Models\Order::count() }}</h4>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!-- Orders Status widgets-->
        <div class="row justify-content-center align-items-center">
            <div class="col-xl-8 mb-30 text-center">
                <div class="card card-statistics h-100 text-center">
                    <div style="width:100%;">
                        {!! $chartjs->render() !!}
                    </div>
                </div>
            </div>
        </div>


    @endsection
    @section('js')

    @endsection
