
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
        <meta name="author" content="potenzaglobalsolutions.com" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        @include('adminDashboard.layouts.head')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-<SHA-INTEGRITY>" crossorigin="anonymous" />

    </head>
    <body>
        <div class="wrapper">
            <div id="pre-loader">
                <img src="{{URL::asset('assets/images/pre-loader/loader-01.svg')}}" alt="">
            </div>
            @include('adminDashboard.layouts.main-header')
            @include('adminDashboard.layouts.main-sidebar')
            <!-- main-content -->
            <div class="content-wrapper">
                @yield('page-header')
                <div class="page-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">@yield('PageTitle')</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="default-color">Dashboar</a></li>
                                <li class="breadcrumb-item active">@yield('PageTitle')</li>
                            </ol>
                        </div>
                    </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @yield('content')
                    @include('adminDashboard.layouts.footer')
                </div>
            </div>
        </div>
        </div>
        @include('adminDashboard.layouts.footer-scripts')
        <script>
            setInterval(function() {
                $("#notifications").load(window.location.href + " #notifications");
                $("#datatable").load(window.location.href + " #datatable");
            }, 10000);
        
        </script>
    </body>
</html>

