
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
                    <a href="{{ route('home') }}" class="nav-item nav-link">Home</a>
                    <a href="{{route('customer.product.showAll')}}" class="nav-item nav-link">Products</a>
                    <a href="{{route('customer.category.showAll')}}" class="nav-item nav-link">Categories</a>
                    {{-- <a href="{{ route('cart.index') }}" class="nav-item nav-link">Cart</a> --}}
                    <a href="{{route('show-cart.index')}}" class="nav-item nav-link">Cart</a>
                    <div class="nav-item dropdown">
                        @auth('customer')
                            @if(auth('customer')->user())
                            
                            @endif
                            @endauth
                    </div>
                </div>
                <div class="antialiased">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            @auth('customer')
                                <i class="fas fa-user-circle mr-2"></i> {{ auth('customer')->user()->name }}
                            @else
                                <i class="fas fa-user-circle mr-2"></i> User Account
                            @endauth
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-right border-2 border-gray-200 rounded-md shadow-lg py-3 px-4">
                            <div class="flex flex-col items-start space-y-3">
                        
                                @auth('web')
                                    <!-- If the user is logged in as 'web' -->
                                    <a href="{{ url('/admin/dashboard') }}" class="text-indigo-500 hover:underline">
                                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                                    </a>
                                @elseif (auth('customer')->check())
                                    <!-- If the user is logged in as 'customer' -->
                                    <a href="{{ url('/customer/dashboard') }}" class="text-indigo-500 hover:underline">
                                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                                    </a>
                                    <br>
                                    <br>
                                    <a href="{{ route('logout', 'customer') }}" class="text-indigo-500 hover:underline">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Log out
                                    </a>
                                    
                                @else
                                    <!-- If the user is not logged in -->
                                    <a href="{{ route('selection') }}" class="text-indigo-500 hover:underline">
                                        <i class="fas fa-sign-in-alt mr-2"></i> Log in
                                    </a>
                                    <br>
                                    <br>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="text-indigo-500 hover:underline">
                                            <i class="fas fa-user-plus mr-2"></i>Register
                                        </a>
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

