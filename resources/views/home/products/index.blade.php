

@extends('home.layouts.app')
@section('css')

@endsection

    @section('PageTitle')
        Product List
    @stop
    <!-- breadcrumb -->

@section('content')
    <!-- Product List Start -->
    <div class="product-view">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-view-top">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="product-price-range">
                                            <form action="{{ route('customer.product.filterProducts') }}" method="get" class="p-2">
                                                @csrf
                                                <div class="form-group mb-0">
                                                    <div class="input-group">
                                                        <select class="form-control form-control-sm" name="price_range" required onchange="this.form.submit()">
                                                            <option value="" selected disabled>-- Select price --</option>
                                                            <option value="1">1$ - 100$</option>
                                                            <option value="2">100$ - 5000$</option>
                                                            <option value="3">5000$ - 10000$</option>
                                                        </select>

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @forelse ($products as $product)
                            <div class="col-md-4">
                                <div class="product-item">
                                    <div class="product-title">
                                        {{-- <a href="#">{{ $product->categories->name }}</a> --}}
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
                                            <a href="{{route('customer.product.show' ,$product->id)}}"><i class="fa fa-cart-plus"></i></a>
                                            @if(auth()->guard('customer')->user())
                                            <form>
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <a href="wishlist.html" class="btn wishlist">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                            </form>
                                            @endif
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
                                        <p style="font-size: 20px">No products found.</p>
                                    </span>
                                </div>
                            @endforelse
                        <br><br><br><br>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="custom-pagination text-center" style="font-size: 14px;">
                            <ul class="pagination">
                                <!-- Previous Page Link -->
                                @if ($products->onFirstPage())
                                    <li class="page-item disabled"><span class="page-link">Previous</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $products->previousPageUrl() }}">Previous</a></li>
                                @endif

                                <!-- Pagination Elements -->
                                @for ($i = 1; $i <= $products->lastPage(); $i++)
                                    @if ($i == $products->currentPage())
                                        <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                                    @else
                                        <li class="page-item"><a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a></li>
                                    @endif
                                @endfor

                                <!-- Next Page Link -->
                                @if ($products->hasMorePages())
                                    <li class="page-item"><a class="page-link" href="{{ $products->nextPageUrl() }}">Next</a></li>
                                @else
                                    <li class="page-item disabled"><span class="page-link">Next</span></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
<br>
            </div>
<br>
@endsection
@section('js')

@endsection
