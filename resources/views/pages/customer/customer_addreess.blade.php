

@extends('layouts.master')
@section('css')

    @section('title')
        Costomers Address
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        Costomers Address
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
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                       data-page-length="50"
                                       style="text-align: center">
                                    <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Country</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Address Title</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $customer_address->first_name . ' ' . $customer_address->last_name  }}</td>
                                            <td>{{ $customer_address->countries->name }}</td>
                                            <td>{{ $customer_address->states->name }}</td>
                                            <td>{{ $customer_address->cities->name }}</td>
                                            <td>{{ $customer_address->address_title}}</td>
                                            <td>{{ $customer_address->email }}</td>
                                            <td>{{ $customer_address->phone }}</td>
                                            <td>{{ $customer_address->address }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="6">No customers found.</td>
                                        </tr>

                                </table>
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
