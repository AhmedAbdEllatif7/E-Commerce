<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.layouts.headcss')
</head>

<body>
    @include('home.layouts.main-header')
    <div class="content-wrapper">
        @yield('page-header')
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="mb-0" style="font-family: 'Cairo', sans-serif; color: #ff6f61" >&nbsp;&nbsp;&nbsp;@yield('PageTitle')</h1>
                </div>
            </div>
            @yield('content')
            @include('home.layouts.footer')
            @include('home.layouts.footer-scripts')
        </div><!-- main content wrapper end-->
    </div>
</body>
<livewire:scripts />

</html>
