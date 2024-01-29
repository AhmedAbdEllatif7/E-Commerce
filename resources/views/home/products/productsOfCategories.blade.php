

     @extends('home.layouts.app')
     @section('css')

     @section('title')
     Products
     @stop
     @endsection
     @section('page-header')
         <!-- breadcrumb -->
     @section('PageTitle')
     Products
     @stop
     <!-- breadcrumb -->
     @endsection
     @section('content')
        <!-- Product List Start -->
        <div class="product-view">
            <div class="container-fluid">
                <div class="row">
                    @include('home.filter')
                        <div class="sidebar-widget widget-slider">
                            <div class="sidebar-slider normal-slider">
                                @foreach ($showProduct as $product )
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
                                            <img src="{{ URL::asset('attachments/products/'.$product->image) }}" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="{{ route('products.show',$product->id) }}"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span>{{ $product->price }}</h3>
                                        <a class="btn" href="{{ route('products.show',$product->id) }}"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @section('content')
                            <!-- Product List Start -->
                            <div class="product-view">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="product-view-top">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <div class="product-price-range">
                                                                    <form action="{{ route('customer.category.filter') }}" method="get">
                                                                        {{ csrf_field() }}
                                                                        <select class="form-control form-control-sm" name="price_range" required onchange="this.form.submit()">
                                                                            <option value="" selected disabled>-- Select price --</option>
                                                                            <option value="1">1$ - 100$</option>
                                                                            <option value="2">100$ - 5000$</option>
                                                                            <option value="3">5000$ - 10000$</option>
                                                                        </select>
                                                                        <input name="categoryId" type="hidden" value="{{$categoryId}}">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @forelse  ($products as $product )
                                                    <div class="col-md-4">
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
                                                                    <img src="{{URL::asset('attachments/products/'.$product->image)}}" alt="Slider Image"  style="width: 100%; height: 300px;"/>
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
                                                                <a class="btn" href="{{ route('customer.product.show',$product->id) }}"><i class="fa fa-shopping-cart"></i>Buy</a>
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

                                            </div>

                                        </div>

                                        <!-- Side Bar Start -->
                                        <div class="col-lg-4 sidebar">
                                            <div class="sidebar-widget category">
                                                <h2 class="title">Category</h2>
                                                @foreach ($categories as $categorie )
                                                    <nav class="navbar bg-light">
                                                        <ul class="navbar-nav">
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="{{ route('customer.category.show',$categorie->id) }}">{{ $categorie->name }}</a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                @endforeach
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
                                        <!-- Side Bar End -->
                                    </div>
                                </div>
                            </div>
                            <!-- Product List End -->

                            <!-- Brand Start -->
                            <div class="brand">
                                <div class="container-fluid">
                                    <div class="brand-slider">
                                        <div class="brand-item"><img src="img/brand-1.png" alt=""></div>
                                        <div class="brand-item"><img src="img/brand-2.png" alt=""></div>
                                        <div class="brand-item"><img src="img/brand-3.png" alt=""></div>
                                        <div class="brand-item"><img src="img/brand-4.png" alt=""></div>
                                        <div class="brand-item"><img src="img/brand-5.png" alt=""></div>
                                        <div class="brand-item"><img src="img/brand-6.png" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Brand End -->

                        @endsection
                        @section('js')

                        @endsection
                    </div>
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <!-- Product List End -->

        <!-- Brand Start -->
        <div class="brand">
            <div class="container-fluid">
                <div class="brand-slider">
                    <div class="brand-item"><img src="img/brand-1.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-2.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-3.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-4.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-5.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-6.png" alt=""></div>
                </div>
            </div>
        </div>
        <!-- Brand End -->

        @endsection
        @section('js')

        @endsection
