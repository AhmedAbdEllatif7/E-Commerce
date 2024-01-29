@extends('adminDashboard.layouts.master')
@section('css')

@section('title')
Add new customer
    @stop
    @endsection
    @section('page-header')
    <br>     <!-- breadcrumb -->
    @section('PageTitle')
    Add new customer
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('customers.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="name">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>      
                    <div class="form-row">
                        <div class="col">
                            <label for="name">Password</label>
                            <input type="text" name="password" class="form-control" required>
                        </div>
                    </div>      
                    <div class="form-row">
                        <div class="col">
                            <label for="name">Address title</label>
                            <input type="text" name="address_title" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="name">Address</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="name">Phone</label>
                            <input type="number" name="phone" class="form-control" required>
                        </div>
                    </div>

                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-left type="submit">Create
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- row closed -->
@endsection
@section('js')

@endsection
