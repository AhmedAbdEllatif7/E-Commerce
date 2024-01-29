 <!-- Main Slider Start -->

 <div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <nav class="navbar bg-light">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">
                                <i class="fa fa-home"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        @foreach ($categories as $category)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('customer.category.show', $category->id) }}">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>{{ $category->name }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
            
            <div class="col-md-6">
                <div class="header-slider normal-slider">
                    @foreach($categories as $categorie)
                        <div class="header-slider-item">
                            <img src="{{ URL::asset('attachments/categories/' . $categorie->image) }}" alt="Slider Image" style="width: 100%; height: 400px;" />
                            <div class="header-slider-caption">
                                <p>{{ $categorie->name }}</p>
                                <a class="btn" href="{{ route('customer.category.show', $categorie->id) }}"><i class="fa fa-shopping-cart"></i>Shop Now</a>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
            <div class="col-md-3">
                <div class="header-img">
                    @foreach($randomProducts as $randomProduct)
                        <div class="img-item">
                            <img src="{{ URL::asset('attachments/products/' . $randomProduct->image) }}" alt="Slider Image" />
                            <a class="img-text" href="">
                                <p>{{$randomProduct->description}}</p>
                            </a>
                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Shop Now</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Slider End -->
