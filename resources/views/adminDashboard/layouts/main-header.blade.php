{{-- @livewireStyles

<livewire:main-header/>

@livewireScripts --}}

<div>
    {{-- READ NOTIFICATION MODAL --}}
    @include('adminDashboard.layouts.read-notifications')<div>

    </div>
    <div>
        <div>
            <nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <!-- logo -->
                <div class="text-left navbar-brand-wrapper">
                    <a class="navbar-brand brand-logo" href="{{-- route('dashboard.admin') --}}"><img
                            src="{{ URL::asset('assets/images/ECommerce.png') }}" alt=""> </a>
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img
                            src="{{ URL::asset('assets/images/Admin 2.png') }}" alt=""></a>
                </div>
                <!-- top bar right -->
                <ul class="nav navbar-nav ml-auto">
                    {{-- notifications --}}
                    <li class="nav-item dropdown" id="notifications">
                        <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="ti-bell" style="font-size: 20px; position: relative;">
                                @if (auth()->user()->unreadNotifications->count() > 0)
                                    <span class="badge badge-danger notification-badge"
                                        style="position: absolute; top: -10px; left: 8px;">
                                        {{ auth()->user()->unreadNotifications->count() }}
                                    </span>
                                @endif
                            </i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications"
                            style="max-height: 300px; overflow-y: auto;">
                            <div class="dropdown-header notifications">
                                <strong>Notifications</strong>
                                <span class="badge badge-pill badge-danger">
                                    {{ auth()->user()->unreadNotifications->count() }}
                                </span>
                            </div>

                            <div class="mark-as-read-button" style="margin-left: 17px;">
                                @if (auth()->user()->unreadNotifications->count() > 0)
                                    <a href="#" class="btn btn-sm btn-warning" data-toggle="modal"
                                        data-target="#markAllAsReadModal">Mark All as Read</a>
                                @endif

                                @if (auth()->user()->readNotifications->count() > 0)
                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#readNotificationsModal">Read Notifications</a>
                                @endif

                            </div>

                            <br>
                            @foreach (auth()->user()->unreadNotifications as $notification)
                                <div class="notification-item">
                                    <div class="notification-content" style="padding-left: 15px;">
                                        {{--                            <div class="notification-icon"> --}}
                                        {{--                                <i class="fa fa-bell text-danger"></i> --}}
                                        {{--                            </div> --}}
                                        <div class="notification-details">
                                            <div class="notification-title">
                                                <strong>Creator: {{ $notification->data['creator'] }}</strong>
                                            </div>
                                            <div class="notification-message">
                                                {{ $notification->data['message'] }} : <strong>
                                                    {{ $notification->data['product_name'] }} </strong>
                                            </div>
                                            <div class="notification-time">
                                                <small>{{ $notification->created_at->format('F j, Y, g:i a') }}</small>
                                            </div>
                                        </div>
                                        <div class="mark-as-read-button">
                                            <a href="{{ route('read.notification', $notification->id) }}"
                                                class="btn btn-sm btn-primary">Mark as Read</a>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            @endforeach



                        </div>
                    </li>
                    {{-- end notification --}}
                    <li class="nav-item dropdown mr-30">
                        <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="{{ URL::asset('assets/images/Admin 2.png') }}" alt="avatar">
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

                            <form method="GET" action="{{ route('logout', 'customer') }}">

                                <form method="GET" action="{{ route('logout', 'web') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout', 'type')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                                </a>
                        </div>
                    </li>
                </ul>
                <div class="modal fade" id="readNotificationsModal" tabindex="-1" role="dialog"
                    aria-labelledby="readNotificationsModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="readNotificationsModalLabel">Read Notifications</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if (auth()->user()->readNotifications->isNotEmpty())
                                    <ul class="list-group">
                                        @foreach (auth()->user()->readNotifications as $notification)
                                            <li class="list-group-item">
                                                <div class="notification-content">
                                                    <div class="notification-title">
                                                        <strong>Creator: {{ $notification->data['creator'] }}</strong>
                                                    </div>
                                                    <div class="notification-message">
                                                        {{ $notification->data['message'] }}
                                                    </div>
                                                    <small class="text-muted notification-time">
                                                        {{ $notification->created_at->format('F j, Y, g:i a') }}
                                                    </small>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No read notifications available.</p>
                                @endif

                                <form action="{{ route('delete.read.notifications') }}" method="POST">
                                    @csrf
                                    <p>Are you sure you want to delete all read notifications?</p>
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-warning">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </nav>

            {{-- MARK ALL NOTIFICATIONS AS READ --}}
            <div class="modal fade" id="markAllAsReadModal" tabindex="-1" role="dialog"
                aria-labelledby="markAllAsReadModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="markAllAsReadModalLabel">Mark All Notifications as Read</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('read.all.notification') }}" method="GET">
                                @csrf
                                <p>Are you sure you want to mark all notifications as read?</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-warning">Mark All as Read</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <br>
        </div>
    </div>
</div>
<!--=================================
    header End-->
