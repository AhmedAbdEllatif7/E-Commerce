<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">E-Commerce</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu item Elements-->

                    {{-- start Category --}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="fas fa-tags"></i><span
                                    class="right-nav-text">Category</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('category.index') }}">Show Categories</a></li>
                            <li><a href="{{ route('category.create') }}">Create Category</a></li>
                        </ul>
                    </li>

                    {{-- End Category --}}


                    {{-- Start Product --}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#product">
                            <div class="pull-left"><i class="ti-package"></i><span
                                    class="right-nav-text">{{ __('Products') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="product" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('products.index') }}">Show Products</a></li>
                            <li><a href="{{ route('products.create') }}">Create Product</a></li>
                        </ul>
                    </li>
                    {{-- End Product --}}

                    {{-- Start Orders --}}
                    <li>
                        <a href="{{ route('admin-orders.index') }}">
                            <div class="pull-left"><i class="ti-shopping-cart"></i><span
                                    class="right-nav-text">Orders</span></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    {{-- End Orders --}}

                    {{-- Start Customer --}}
                    <li>
                        <a href="{{ route('customers.index') }}">
                            <div class="pull-left"><i class="ti-user"></i><span class="right-nav-text">Customer</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    {{-- End Customer --}}

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
