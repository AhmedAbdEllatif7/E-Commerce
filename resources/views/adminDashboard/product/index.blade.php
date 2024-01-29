@extends('adminDashboard.layouts.master')
@section('css')

@section('title')
Products
        @stop
        @endsection
        @section('page-header')
        <br>     <!-- breadcrumb -->
        @section('PageTitle')
        Products
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
                            <a href="{{ route('products.create') }}" class="btn btn-success btn-sm" role="button"
                                aria-pressed="true">Add product + </a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="10" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Categorie Name</th>
                                            <th>Product Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Discount</th>
                                            <th>Product Photo</th>
                                            <th>Processes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if ($product->categories)
                                                        {{ $product->categories->name }}
                                                    @endif
                                                </td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->description }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->discount_price }}</td>
                                                <td><img style="width: 70px; "
                                                        src="{{ URL::asset('attachments/products/' . $product->image) }}"
                                                        alt=""></td>
                                                <td>

                                                    <a href="{{ route('products.edit', $product->id) }}"
                                                        class="btn btn-info btn-sm" title="Edit" role="button"
                                                        aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#delete_book{{ $product->id }}" title="Delete"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                            {{-- @include('admin.library.destroy') --}}
                                            <div class="modal fade" id="delete_book{{ $product->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;"
                                                                class="modal-title" id="exampleModalLabel">Delete
                                                                {{ $product->name }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="hidden" name="id"
                                                                value="{{ $product->id }}">
                                                            <input type="hidden" name="file_name"
                                                                value="{{ $product->image }}">
                                                                <h5 style="font-family: 'Cairo', sans-serif;">Are you sure you want to delete it?</h5>
                                                                <div class="modal-footer d-flex justify-content-start">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button class="btn btn-danger">Delete</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
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
