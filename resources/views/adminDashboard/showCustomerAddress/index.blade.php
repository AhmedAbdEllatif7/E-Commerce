@extends('adminDashboard.layouts.master')
@section('css')

@section('title')
    Costomer Address
@stop
@endsection
<br>
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
                                data-page-length="50" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Address Title</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $customerAddress->first_name . ' ' . $customerAddress->last_name }}
                                        </td>
                                        <td>{{ $customerAddress->address_title }}</td>
                                        <td>{{ $customerAddress->email }}</td>
                                        <td>{{ $customerAddress->phone }}</td>
                                        <td>{{ $customerAddress->address }}</td>
                                    </tr>
                                    {{-- @if(!$customerAddress)
                                        <tr>
                                            <td colspan="6">No customers found.</td>
                                        </tr>
                                    @endif --}}
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
