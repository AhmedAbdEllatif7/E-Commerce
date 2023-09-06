@extends('layouts.master')
@section('css')

@section('title')
    Edit Costomer
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Edit Costomer
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

                <form method="post" action="{{route('customer.update' , 'test')}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $customer->name }}" class="form-control">
                            <input type="hidden" name="id" value="{{ $customer->id }}">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ $customer->email }}" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" value="{{ $customer->phone }}" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="addres">Addres</label>
                            <input type="text" name="adders" value="{{ $customer->adders }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="addres">password</label>
                            <input type="password" id="password" class="form-control" name="password">
                            <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" class="form-check-input" onclick="myFunction()"
                                                                 id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">اظهار كلمة المرور</label>
                        </div>
                    </div>
                    <br>

                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                        type="submit">Save</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
@endsection
