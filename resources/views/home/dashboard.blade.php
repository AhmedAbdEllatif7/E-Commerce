@extends('home.layouts.master')
@section('css')
    @section('title') Home @endsection
@endsection


@section('content')
        <!-- Brand Start -->
        <div class="brand">
            <div class="container-fluid">
                <div class="brand-slider">
                    <div class="brand-item"><img src="{{ URL::asset('temp/img/brand-1.png') }}" alt=""></div>
                    <div class="brand-item"><img src="{{ URL::asset('temp/img/brand-2.png') }}" alt=""></div>
                    <div class="brand-item"><img src="{{ URL::asset('temp/img/brand-3.png') }}" alt=""></div>
                    <div class="brand-item"><img src="{{ URL::asset('temp/img/brand-4.png') }}" alt=""></div>
                    <div class="brand-item"><img src="{{ URL::asset('temp/img/brand-5.png') }}" alt=""></div>
                    <div class="brand-item"><img src="{{ URL::asset('temp/img/brand-6.png') }}" alt=""></div>

                </div>
            </div>
        </div>
        <!-- Brand End -->

        <!-- Feature Start-->
        <div class="feature">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fab fa-cc-mastercard"></i>
                            <h2>Secure Payment</h2>
                            <p>
                                Shop confidently with PayPal's secure payment system, ensuring worry-free transactions.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-truck"></i>
                            <h2>Worldwide Delivery</h2>
                            <p>
                                Enjoy global shopping, with products delivered to your doorstep, wherever you are.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-sync-alt"></i>
                            <h2>90 Days Return</h2>
                            <p>
                                Return or exchange items hassle-free within 90 days, because your satisfaction matters.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-comments"></i>
                            <h2>24/7 Support</h2>
                            <p>
                                Reach out to our 24/7 customer support for a seamless shopping experience.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End-->

        @auth('customer')
            @if(auth('customer')->user())
        <!-- Category Start-->
        <div class="category">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="/temp/img/category-3.jpg" />
                            <a class="category-name" href="">
                                <p>cuples</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-250">
                            <img src="/temp/img/category-4.jpg" />
                            <a class="category-name" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                        <div class="category-item ch-150">
                            <img src="/temp/img/category-5.jpg" />
                            <a class="category-name" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-150">
                            <img src="/temp/img/category-6.jpg" />
                            <a class="category-name" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                        <div class="category-item ch-250">
                            <img src="/temp/img/category-7.jpg" />
                            <a class="category-name" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="/temp/img/category-8.jpg" />
                            <a class="category-name" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category End-->

        <!-- Call to Action Start -->
        <div class="call-to-action">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1>call us for any queries</h1>
                    </div>
                    <div class="col-md-6">
                        <a href="tel:0123456789">+201016416800</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action End -->

        <!-- Featured Product Start -->
        <div class="featured-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Featured Product</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                    @foreach($randomProducts as $randomProduct)
                    <div class="col-lg-6">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#">{{$randomProduct->name}}</a>
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
                                    <img src="{{ URL::asset('attachments/products/' . $randomProduct->image) }}" alt="Slider Image" style="width: 100%; height: 300px;" />
                                </a>
                                <div class="product-action">
                                    <a href="{{route('customer.product.show' ,$randomProduct->id)}}"><i class="fa fa-cart-plus"></i></a>
                                    <form>
                                        <input type="hidden" name="product_id" value="{{ $randomProduct->id }}">
                                        <a href="wishlist.html" class="btn wishlist">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </form>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>$</span>{{$randomProduct->price}}</h3>
                                <a class="btn" href="{{route('customer.product.show' ,$randomProduct->id)}}"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Featured Product End -->

            @endif
        @endauth
        <!-- Recent Product Start -->
        <div class="recent-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Recent Product</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                    @foreach($recentProducts as $recentProduct)
                    <div class="col-lg-6">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#">{{$recentProduct->name}}</a>
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
                                    <img src="{{ URL::asset('attachments/products/' . $recentProduct->image) }}" alt="Slider Image" style="width: 100%; height: 300px;" />
                                </a>
                                <div class="product-action">
                                    <a href="{{route('customer.product.show' ,$recentProduct->id)}}"><i class="fa fa-cart-plus"></i></a>
                                    @if(auth()->guard('customer')->user())
                                    <form>
                                        <input type="hidden" name="product_id" value="{{ $recentProduct->id }}">
                                        <a href="wishlist.html" class="btn wishlist">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </form>
                                    @endif
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>$</span>{{$recentProduct->price}}</h3>
                                <a class="btn" href="{{route('customer.product.show' ,$recentProduct->id)}}"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        @endsection
        @section('js')

        @endsection
