

@extends('home.layouts.app')
@section('css')

    @section('title')
        wishlist
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        Wishlist
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- Product List Start -->
    <div class="product-view">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">

                        @forelse ($productsInWishlist as $product)
                            <div class="col-md-4">
                                <div class="product-item">
                                    <div class="product-title">
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="{{ URL::asset('attachments/products/' . $product->image) }}"
                                                 alt="Slider Image" style="width: 100%; height: 400px" />
                                        </a>
                                        <div class="product-action">
                                            <a href="{{ route('customer.product.show', $product->id) }}"><i class="fa fa-cart-plus"></i></a>
                                            <form method="POST" action="{{ route('delete.item', $product->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn delete-button">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span>{{ $product->price }}</h3>
                                        <a class="btn" href="{{ route('customer.product.show', $product->id) }}"><i
                                                class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-md-12 text-center">
                                <span class="badge badge-danger p-3">
                                    <p style="font-size: 20px">No products in the wishlist.</p>
                                </span>
                            </div>
                        @endforelse
                    </div>
                </div>
                <br>
            </div>
            <br>
@endsection
@section('js')



@endsection
