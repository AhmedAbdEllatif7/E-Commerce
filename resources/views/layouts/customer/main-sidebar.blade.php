<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ __('E-Commerce') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="index.html">Dashboard 01</a> </li>
                            <li> <a href="index-02.html">Dashboard 02</a> </li>
                            <li> <a href="index-03.html">Dashboard 03</a> </li>
                            <li> <a href="index-04.html">Dashboard 04</a> </li>
                            <li> <a href="index-05.html">Dashboard 05</a> </li>
                        </ul>
                    </li>
                    <!--facultie -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ __('E-Commerce') }}</li>
                    <!-- menu item Elements-->
                    {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{ __('Categorie') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('category.index') }}">Categorie</a></li>
                            <li><a href="{{ route('category.create') }}">Create Categorie</a></li>

                        </ul>
                    </li> --}}
                    {{-- start Product sidbar --}}
                    {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#product">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                class="right-nav-text">{{ __('Product') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="product" class="collapse" data-parent="#sidebarnav">
                                <li><a href="{{ route('product.index') }}">Products</a></li>
                                <li><a href="{{ route('product.create') }}">Create Product</a></li>

                            </ul>
                        </li> --}}
                        {{-- End Product sidbar --}}
                        {{-- start Addres sidbar --}}
                        {{-- <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Addres">
                                <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{ __('Addres') }}</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="Addres" class="collapse" data-parent="#sidebarnav">
                                    <li><a href="{{ route('addres.index') }}">Addres</a></li>
                                    <li><a href="{{ route('addres.create') }}">Create Addres</a></li>

                                </ul>
                            </li> --}}
                            {{-- End Addres sidbar --}}

                {{-- </ul>
                    <ul class="nav navbar-nav side-menu">
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#ecommerce">
                                <div class="pull-left"><i class="ti-palette"></i><span
                                        class="right-nav-text">{{ __('E-Commerce') }}</span></div>
                                <div class="pull-right"><i class="fa fa-solid fa-share-from-square"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="ecommerce" class="collapse" data-parent="#sidebarnav">
                                <li><a href="{{ route('home') }}">Show E-Commerce</a></li>

                            </ul>
                        </li> --}}
                    </ul>
                    </div>
                </div>

                <!-- Left Sidebar End-->

                <!--=================================
