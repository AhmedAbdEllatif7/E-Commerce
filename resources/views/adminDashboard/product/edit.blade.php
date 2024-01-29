@extends('adminDashboard.layouts.master')
@section('css')

@section('title')
Edit the product
        @stop
        @endsection
        @section('page-header')
        <br>     <!-- breadcrumb -->
        @section('PageTitle')
        Edit the product
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

                <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-row">
                        <div class="col-md-4 form-group">
                            <label for="category_id">Category:</label>
                            <select class="custom-select mr-sm-2" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->categories->id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="col form-group">
                            <label for="name">Product Name:</label>
                            <input type="text" name="name" value="{{ $product->name }}" class="form-control" required placeholder="Enter product name">
                            <input type="hidden" name="id" value="{{ $product->id }}">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="col form-group">
                            <label for="price">Price:</label>
                            <input type="number" name="price" value="{{ $product->price }}" class="form-control" placeholder="Enter price">
                        </div>
                        <div class="col form-group">
                            <label for="discount_price">Discount Price:</label>
                            <input type="number" name="discount_price" value="{{ $product->discount_price }}" class="form-control" placeholder="Enter discount price">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="col form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" class="form-control" rows="5" placeholder="Enter description">{{ $product->description }}</textarea>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="col form-group">
                            <label for="image">Existing Image:</label>
                            <img style="width: 70px;" src="{{ URL::asset('attachments/products/' . $product->image) }}" alt="">
                            <br>
                            <br>
                            <label for="image">New Image:</label>
                            <input type="file" accept="image/*" name="image">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="col">
                            <button class="btn btn-success btn-ms" type="submit">Update</button>
                        </div>
                    </div>
                </form>
                

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
