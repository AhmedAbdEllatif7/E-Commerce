@extends('layouts.master')
@section('css')

@section('title')
    Show orders
     @stop
     @endsection
     @section('page-header')
     <!-- breadcrumb -->
     @section('PageTitle')
    Show Orders
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name Customers</th>
                                            <th>Name Category</th>
                                            <th>Name Products</th>
                                            <th>Price</th>
                                            <th>quantity</th>
                                            <th>size</th>
                                            <th>color</th>
                                            <th>image</th>
                                            <th>date</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>{{ $order->id}}</td>
                                                <td>{{$order->customers->name}}</td>
                                                <td>{{$order->categories->name}}</td>
                                                <td>{{$order->products->name}}</td>
                                                <td>{{$order->amount}}</td>
                                                <td>{{$order->quantity}}</td>
                                                <td>{{$order->size}}</td>
                                                <td>{{$order->color}}</td>
                                                <td><img style="width: 50%" src="{{ URL::asset('attachments/upload_attachments/'.$order->products->image) }}" alt=""></td>
                                                <td>{{$order->created_at->format('d-m-Y')}}</td>

                                            </tr>


                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
