<div class="col-lg-8">
    <div class="row">
        <div class="col-md-12">
            <div class="product-view-top">
                <div class="row">
                    <div class="col-md-4">
                        <div class="product-search">
                            <input type="email" value="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="product-price-range">
                            <div class="dropdown">
                                <form action="{{route('customer.product.filter.price')}}" method="get" class="border rounded p-2">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <select class="form-control form-control-sm" name="grade_id" required onchange="this.form.submit()">
                                            <option value="" selected disabled>-- Select Grade --</option>
                                            <option value="1" > All </option>
                                            <option value="1" > 100$ : 5000$ </option>
                                            <option value="1" > 5000$ : 10000$ </option>
                                        </select>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($products as $product )
            <div class="col-md-4">
                <div class="product-item">
                    <div class="product-title">
                        <a href="#">{{ $product->categories->name }}</a>
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
                            <img src="{{URL::asset('attachments/products/'.$product->image)}}" alt="Slider Image" />
                        </a>
                        <div class="product-action">
                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                            <a href="#"><i class="fa fa-heart"></i></a>
                            <a href="#"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="product-price">
                        <h3><span>$</span>{{ $product->price }}</h3>
                        <a class="btn" href="{{ route('customer.product.show',$product->id) }}"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <!-- Pagination Start -->
    <div class="col-md-12">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- Pagination Start -->
</div>

<!-- Side Bar Start -->
<div class="col-lg-4 sidebar">
    <div class="sidebar-widget category">
        <h2 class="title">Category</h2>
        @foreach ($categories as $categorie )
            <nav class="navbar bg-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customer.category.show',$categorie->id) }}">{ $categorie->name }}</a>
                    </li>
                </ul>
            </nav>
        @endforeach
    </div>
