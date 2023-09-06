@extends('layouts.master')
@section('css')

@section('title')
       Edit orders
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Edit orders
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

                <form method="POST" action="{{ route('orders.update',$order->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col">
                            <label for="name">Price</label>
                            <input type="text" name="amount" value="{{ $order->amount }}" class="form-control">
                            <input type="hidden" name="id" value="{{ $order->id }}" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="name">quantity</label>
                            <input type="number" name="quantity" value="{{ $order->quantity }}" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="name">size</label>
                            <select class="custom-select my-1 mr-sm-2" name="size"  >
                                <option selected disabled value="{{ $order->size }}" class="btn">{{ $order->size }}</option>
                                <option  class="btn">S</option>
                                <option  class="btn">M</option>
                                <option  class="btn">L</option>
                                <option  class="btn">XL</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="name">color</label>
                            <select class="custom-select my-1 mr-sm-2" name="color"  >
                                <option selected disabled value="{{ $order->color }}" class="btn">{{ $order->color }}</option>
                                <option   class="btn">White</option>
                                <option   class="btn">Black</option>
                                <option  class="btn">Blue</option>
                            </select>
                        </div>
                    </div>
                    <br>


                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
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
