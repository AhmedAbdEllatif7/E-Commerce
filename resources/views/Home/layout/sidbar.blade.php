 <!-- Main Slider Start -->

 <div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <nav class="navbar bg-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#"><i class="fa fa-shopping-bag"></i>Best Selling</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#"><i class="fa fa-plus-square"></i>New Arrivals</a>--}}
{{--                        </li>--}}



                        <li class="nav-item">
                            @foreach ($categories as $categorie)
                            <a class="nav-link" href="{{ route('customer.category.show',$categorie->id) }}"><i class="fa fa-shopping-cart"></i>{{ $categorie->name }}</a>
                            @endforeach
                        </li>

{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#"><i class="fa fa-child"></i>Kids & Babies Clothes</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#"><i class="fa fa-tshirt"></i>Men & Women Clothes</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#"><i class="fa fa-mobile-alt"></i>Gadgets & Accessories</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#"><i class="fa fa-microchip"></i>Electronics & Accessories</a>--}}
{{--                        </li>--}}
                    </ul>
                </nav>
            </div>
            <div class="col-md-6">
                <div class="header-slider normal-slider">
                    @foreach($categories as $categorie)
                        <div class="header-slider-item">
                            <img src="{{ URL::asset('attachments/upload_attachments/' . $categorie->image) }}" alt="Slider Image" style="width: 95%; height: 400px;" />
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
                            <img src="{{ URL::asset('attachments/upload_attachments/' . $randomProduct->image) }}" alt="Slider Image" />
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
