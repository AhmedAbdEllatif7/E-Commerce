@extends('adminDashboard.layouts.master')
@section('css')

@section('title')
Edit Customer
        @stop
        @endsection
        @section('page-header')
        <br>     <!-- breadcrumb -->
        @section('PageTitle')
        Edit Customer
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <form method="POST" action="{{ route('customers.update', $customer->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $customer->name }}" class="form-control" required>
                        </div>
                    </div>      
                    <div class="form-row">
                        <div class="col">
                            <label for="name">Email</label>
                            <input type="email" name="email" value="{{ $customer->email }}" class="form-control" required>
                        </div>
                    </div>      
                    <br>                    
                    @foreach($customer->customerAddress as $address)
                        <div class="form-row">
                            <div class="col">
                                <label for="name">Address title</label>
                                <input type="text" name="address_title" value="{{ $address->address_title }}" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="name">Address</label>
                                <input type="text" name="address" value="{{ $address->address }}" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="name">Phone</label>
                                <input type="number" name="phone" value="{{ $address->phone }}" class="form-control" required>
                            </div>
                        </div>
                    @endforeach
                    <br>                    
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-left"
                        type="submit">Update</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
