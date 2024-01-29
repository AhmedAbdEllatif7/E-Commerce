@extends('home.layouts.app')
@section('css')

@section('title')
Product details
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
   Product details
@stop
<!-- breadcrumb -->
@endsection
@section('content')
        <!-- Product Detail Start -->
        <div class="product-detail">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="product-detail-top">
                            <div class="row align-items-center">

                                <div class="col-md-5">
                                    <div class="product-slider-single normal-slider">
                                        <img src="{{URL::asset('attachments/products/'.$product->image)}}" alt="Product Image">

                                    </div>
                                    <div class="product-slider-single-nav normal-slider">
                                        <div class="slider-nav-img"><img src="{{URL::asset('attachments/products/'.$product->image)}}" alt="Product Image"></div>

                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="product-content">
                                        <div class="title"><h2>{{ $product->name }}</h2></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <form action="{{route('orders.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="price">
                                            <h4>Price:</h4>
                                            <input type="hidden" name="amount" value="{{ $product->price }}">
                                            <p>{{ $product->price }} <span>{{ number_format($product->price + $product->discount_price) }}.00</span></p>
                                        </div>

                                        <div class="quantity">
                                            <h4>Quantity:</h4>
                                            <div class="qty">
                                                <input type="number" name="quantity" value="1" >
                                            </div>
                                        </div>

                                        <div class="p-size">
                                            <h4>Size:</h4>
                                            <select name="size" >
                                                <option value="S" selected type="button"  class="btn">S</option>
                                                <option value="M" type="button"  class="btn">M</option>
                                                <option value="L" type="button"  class="btn">L</option>
                                                <option VALUE="XL" type="button"  class="btn">XL</option>
                                            </select>
                                        </div>
                                        <div class="p-color">
                                            <h4>Color:</h4>
                                            <select name="color">
                                                <option value="white" selected type="button"  class="btn">White</option>
                                                <option value="black" type="button"  class="btn">Black</option>
                                                <option value="blue"  type="button"  class="btn">Blue</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="customer_id" value="{{ $product->customer_id }}">
                                        <input type="hidden" name="user_id" value="{{ $product->user_id }}">
                                        <input type="hidden" name="category_id" value="{{ $product->categories->id }}">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                                        <div class="action">
                                            <button class="btn" ><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Add to cart</button>&nbsp;
                                            @if(auth()->guard('customer')->user())
                                            <a href="wishlist.html" class="btn wishlist">
                                                <i class="fa fa-heart"></i>
                                                <span>favourite</span>
                                            </a>
                                            @endif
                                        </div>

                                    </div>
                                        </form>
                                </div>
                            </div>
                        </div>

                        <div class="row product-detail-bottom">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="description" class="container tab-pane active">
                                        <h4>Product description</h4>
                                        <p>
                                            {{ $product->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="product">
                            <div class="section-header">
                                <h1>Related Products</h1>
                            </div>
                            <div class="row align-items-center product-slider product-slider-9">
                                @foreach ($products as $product )
                                <div class="col-lg-5">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#">{{ $product->name }}</a>
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
                                                <img src="{{ asset('attachments/products/'.$product->image) }}" alt="Product Image" style="width: 100%; height: 300px;">
                                            </a>

                                            <div class="product-action">
                                                <a href="{{ route('customer.product.show',$product->id) }}"><i class="fa fa-cart-plus"></i></a>
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
                                        </form>
                                        <div class="product-price">
                                            <h3><span>$</span>{{$product->price}}</h3>
                                            <a class="btn" href="{{ route('customer.product.show',$product->id) }}"><i class="fa fa-shopping-cart"></i>Buy</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                        <div class="sidebar-widget category">
                            <h2 class="title">Category</h2>
                            <nav class="navbar bg-light">
                                @foreach ($categories as $categorie )
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('customer.category.show',$categorie->id) }}">{{ $categorie->name }}</a>
                                    </li>
                                </ul>
                                @endforeach
                            </nav>
                        </div>

                        <div class="sidebar-widget widget-slider">
                            <div class="sidebar-slider normal-slider">
                                @foreach ($products as $product )
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="{{ route('products.show',$product->id) }}">{{ $product->name }}</a>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="{{ route('products.show',$product->id) }}">
                                                <img src="{{ URL::asset('attachments/products/'.$product->image) }}" alt="Product Image" style="width: 100%; height: 400px;" >
                                            </a>
                                            <div class="product-action">
                                                <a href="{{ route('customer.product.show',$product->id) }}"><i class="fa fa-cart-plus"></i></a>
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
                                            <a class="btn" href={{ route('customer.product.show',$product->id) }}"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="sidebar-widget brands">
                            <h2 class="title">Our Brands</h2>
                            <ul>
                                <li><a href="#">Nulla </a><span>(45)</span></li>
                                <li><a href="#">Curabitur </a><span>(34)</span></li>
                                <li><a href="#">Nunc </a><span>(67)</span></li>
                                <li><a href="#">Ullamcorper</a><span>(74)</span></li>
                                <li><a href="#">Fusce </a><span>(89)</span></li>
                                <li><a href="#">Sagittis</a><span>(28)</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <!-- Product Detail End -->

        <!-- Brand Start -->
        <div class="brand">
            <div class="container-fluid">
                <div class="brand-slider">
                    <div class="brand-item"><img src="/temp/img/brand-1.png" alt=""></div>
                    <div class="brand-item"><img src="/temp/img/brand-2.png" alt=""></div>
                    <div class="brand-item"><img src="/temp/img/brand-3.png" alt=""></div>
                    <div class="brand-item"><img src="/temp/img/brand-4.png" alt=""></div>
                    <div class="brand-item"><img src="/temp/img/brand-5.png" alt=""></div>
                    <div class="brand-item"><img src="/temp/img/brand-6.png" alt=""></div>
                </div>
            </div>
        </div>
        <!-- Brand End -->

        @endsection
        @section('js')




        @endsection
