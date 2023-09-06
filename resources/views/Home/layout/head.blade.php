{{--<div class="top-bar">--}}
{{--    <div class="container-fluid">--}}
{{--        <div class="row">--}}
{{--            <div class="col-sm-6">--}}
{{--                <i class="fa fa-envelope"></i>--}}
{{--                support@email.com--}}
{{--            </div>--}}
{{--            <div class="col-sm-6">--}}
{{--                <i class="fa fa-phone-alt"></i>--}}
{{--                +012-345-6789--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- Top bar End -->

<!-- Nav Bar Start -->
<div class="nav">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                    <a href="{{route('customer.product.showAll')}}" class="nav-item nav-link">Products</a>
                    <a href="{{route('customer.category.showAll')}}" class="nav-item nav-link">Categories</a>
                    {{-- <a href="{{ route('cart.index') }}" class="nav-item nav-link">Cart</a> --}}
                    <a href="{{route('show-cart.index')}}" class="nav-item nav-link">Checkout</a>
                    <div class="nav-item dropdown">
                        @auth('customer')
                            @if(auth('customer')->user())
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More Pages</a>
                        <div class="dropdown-menu">
                            <a href="{{route('show.wishlist')}}" class="dropdown-item">Wishlist</a>
                            <a href="{{route('selection')}}" class="dropdown-item">Login & Register</a>
                            <a href="contact.html" class="dropdown-item">Contact Us</a>
                        </div>
                            @endif
                            @endauth
                    </div>
                </div>
                <div class="antialiased">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
                        <div class="dropdown-menu">
                            <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                                @auth('web')
                                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                                @elseif (auth('customer')->check())
                                    <a href="{{ url('/customer/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                                        <form method="GET" action="{{ route('logout', 'customer') }}">
                                            @csrf
                                            <x-dropdown-link :href="route('logout', 'type')"
                                                             onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </a>
                                @else
                                    <a href="{{ route('selection') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Nav Bar End -->

<!-- Bottom Bar Start -->
<div class="bottom-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">
                    {{-- <a href="{{ route('home') }}"> --}}
                        <img src="/temp/img/logo.png" alt="Logo">
                    </a>
                </div>
            </div>


            <div class="col-md-6">
                <form action="{{ route('products.search') }}" method="GET">
                    <input required type="text" name="query" placeholder="Search for products..." style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; width: 500px;">
                    <button type="submit" style="padding: 10px 20px; border-radius: 5px; cursor: pointer;" class=" btn btn-primary">
                        Search
                    </button>
                </form>
            </div>


            <div class="col-md-3">
                <div class="user">
                    @auth('customer')
                        @if(auth('customer')->user())
                            <a href="{{route('show.wishlist')}}" class="btn heart">
                                <i class="fa fa-heart"></i>
                            </a>
                        @endif
                    @endauth

                    @auth('customer')
                        @if(auth('customer')->user())
                            <span style="margin-right: 10px;"></span> <!-- إضافة عنصر فارغ مع هامش للمسافة -->
                            <a href="{{route('show-cart.index')}}" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span>( {{ auth('customer')->user()->unreadNotifications->count() }} )</span>
                            </a>
                        @else
                            <span>(0)</span>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bottom Bar End -->

