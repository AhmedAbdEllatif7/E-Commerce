        <!--=================================
 header start-->
        <nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <!-- logo -->
            <div class="text-left navbar-brand-wrapper">
                <a class="navbar-brand brand-logo" href="{{ route('dashboard') }}"><img src="{{ URL::asset('assets/images/ECommerce.png') }}" alt=""> </a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{URL::asset('assets/images/Admin 2.png')}}"
                        alt=""></a>
            </div>
            <!-- Top bar left -->
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left"
                        href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
                </li>
                <li class="nav-item">
                    <div class="search">
                        <a class="search-btn not_click" href="javascript:void(0);"></a>
                        <div class="search-box not-click">
                            <input type="text" class="not-click form-control" placeholder="Search" value=""
                                name="search">
                            <button class="search-button" type="submit"> <i class="fa fa-search not-click"></i></button>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- top bar right -->
            <ul class="nav navbar-nav ml-auto">
                <div class="btn-group mb-1 nav-item dropdown">
                  <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if (App::getLocale() == 'ar')
                    {{ LaravelLocalization::getCurrentLocaleName() }}
                   <img src="{{ URL::asset('assets/images/flags/EG.png') }}" alt="">
                    @else
                    {{ LaravelLocalization::getCurrentLocaleName() }}
                    <img src="{{ URL::asset('assets/images/flags/US.png') }}" alt="">
                    @endif
                    </button>
                  <div class="dropdown-menu">
                      @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                              <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                  {{ $properties['native'] }}
                              </a>
                      @endforeach
                    </div>
                    </div>
                <li class="nav-item fullscreen">
                    <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
                </li>

                {{--notifications--}}
                <li class="nav-item dropdown">
                    <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        <i class="ti-bell">
                            @if(auth()->user()->unreadNotifications->count() > 0)
                                <span class="badge badge-danger notification-status">
                    {{ auth()->user()->unreadNotifications->count() }}
                </span>
                            @endif
                        </i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                        <div class="dropdown-header notifications">
                            <strong>Notifications</strong>
                            <span class="badge badge-pill badge-warning">
                {{ auth()->user()->unreadNotifications->count() }}
            </span>
                        </div>
                        <div class="dropdown-divider"></div>
                        @foreach(auth()->user()->unreadNotifications as $notification)
                            <a href="" class="dropdown-item">
                                creator : {{ $notification->data['creator'] }}<br>
                                Messgae : {{ $notification->data['message'] }}
                                <small class="float-right text-muted time">
                                    {{ $notification->created_at->diffForHumans() }}
                                </small>
                            </a>
                        @endforeach
                    </div>
                </li>

                <li class="nav-item dropdown mr-30">
                    <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="{{URL::asset('assets/images/Admin 2.png')}}" alt="avatar">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header">
                            <div class="media">
                                @auth
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-0"></h5>
                                        <span>{{ Auth::user()->email }}</span>
                                    </div>
                                @endauth

                            </div>
                        </div>
                        <div class="dropdown-divider"></div>

                            {{-- <form action="{{ route('logout') }}" method="POST">
                            @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form> --}}

                        <form method="GET" action="{{ route('logout','customer') }}">

                                    <form method="GET" action="{{ route('logout','web') }}">
                                    @csrf
                            <x-dropdown-link :href="route('logout','type')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </a>
                    </div>
                </li>
            </ul>
        </nav>

        <!--=================================
 header End-->
