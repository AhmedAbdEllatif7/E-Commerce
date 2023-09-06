@extends('layouts.master')
@section('css')

@section('title')
    Create Costomer New
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Create Costomer New
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

                <form method="post" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="addres">Addres</label>
                            <input type="text" name="adders" class="form-control">
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
