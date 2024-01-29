<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.layouts.headcss')
</head>

<body style="scroll-behavior: smooth;">
    <div class="wrapper" style="font-family: 'Cairo', sans-serif">
        @include('home.layouts.main-header')
        @include('home.layouts.home-sidbar')
    <!--=================================
    Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            @yield('page-header')
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">@yield('PageTitle')</h4>
                    </div>
                </div>
                @yield('content')
                @include('home.layouts.footer')
                @include('home.layouts.footer-scripts')
            </div><!-- main content wrapper end-->
        </div>
    </div>
    </div>
    <!--=================================
    footer -->

</body>

</html>
