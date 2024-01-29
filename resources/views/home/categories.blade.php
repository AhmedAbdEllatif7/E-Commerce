@extends('home.layouts.app')

@section('title', 'Categories')
@section('PageTitle')
Categories
@stop
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    @forelse($categories as $category)
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <img src="{{ URL::asset('attachments/categories/' . $category->image) }}" class="card-img-top" alt="Category Image" style="height: 500px; object-fit: cover; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $category->name }}</h5>
                                    <p class="card-text">{{ $category->description }}</p>
                                </div>
                                <div class="card-footer bg-transparent">
                                    <a href="{{ route('customer.category.show', $category->id) }}" class="btn btn-primary btn-block">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-md-12 text-center">
                            <span class="badge badge-danger p-3">
                                <p style="font-size: 20px">No category found.</p>
                            </span>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
