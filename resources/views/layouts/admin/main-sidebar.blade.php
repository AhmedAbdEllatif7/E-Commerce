<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{url('/dashboard')}}" >
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ __('E-Commerce') }}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!--facultie -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ __('E-Commerce') }}</li>
                    <!-- menu item Elements-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{ __('Category') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('category.index')}}">Show Categories</a></li>
                            <li><a href="{{route('category.create')}}">Create Category</a></li>

                        </ul>
                    </li>
                    {{-- start Product sidbar --}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#costomer">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                class="right-nav-text">{{ __('Customer') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                        </a>
                            <ul id="costomer" class="collapse" data-parent="#sidebarnav">
                                <li><a href="{{route('customer.index')}}">Show Customer</a></li>
                                <li><a href="{{route('customer.create')}}" >Create Customer</a></li>

                            </ul>
                     </li>

                      {{-- start Product sidbar --}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#product">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                class="right-nav-text">{{ __('Products') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="product" class="collapse" data-parent="#sidebarnav">
                                <li><a href="{{route('product.index')}}">Show Products</a></li>
                                <li><a href="{{route('product.create')}}">Create Product</a></li>

                            </ul>
                    </li>
                    {{-- End Product sidbar --}}
                    {{-- Start Orders --}}
                    <li>
                        <a href="{{route('admin-orders.index')}}" >
                            <div class="pull-left"><i class="ti-palette"></i><span
                                class="right-nav-text">{{ __('Orders') }}</span></div>
{{--                                <div class="pull-right"><i class="ti-plus"></i></div>--}}
                                <div class="clearfix"></div>
                            </a>
{{--                            <ul id="order" class="collapse" data-parent="#sidebarnav">--}}
{{--                                <li><a href="{{route('admin-orders.index')}}">orders</a></li>--}}

{{--                            </ul>--}}
                        </li>
                        {{-- End Orders --}}
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#address">
                                <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{ __('countries') }}</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="address" class="collapse" data-parent="#sidebarnav">
                                    <li><a href="{{route('country.index')}}">countries</a></li>
                                    <li><a href="{{route('country.create')}}">Create countries</a></li>

                                </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#state">
                                <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{ __('states') }}</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="state" class="collapse" data-parent="#sidebarnav">
                                    <li><a href="{{route('states.index')}}">states</a></li>
                                    <li><a href="{{route('states.index')}}">Create states</a></li>

                                </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#cities">
                                <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{ __('cities') }}</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="cities" class="collapse" data-parent="#sidebarnav">
                                    <li><a href="{{route('cities.index')}}">cities</a></li>
                                    <li><a href="{{route('cities.create')}}">Create cities</a></li>

                                </ul>
                        </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
