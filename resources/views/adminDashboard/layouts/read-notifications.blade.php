<!-- READ NOTIFICATION MODAL -->
<div class="modal fade" id="readNotificationsModal" tabindex="-1" role="dialog" aria-labelledby="readNotificationsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="readNotificationsModalLabel">Read Notifications</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
                @if (auth()->user()->readNotifications->isNotEmpty())
                    <ul class="list-group">
                        @foreach (auth()->user()->readNotifications as $notification)
                            <li class="list-group-item">
                                <div class="notification-content">
                                    <div class="notification-title">
                                        <strong>Creator: {{ $notification->data['creator'] }}</strong>
                                    </div>
                                    <div class="notification-message">
                                        {{ $notification->data['message'] }}: <strong>{{ $notification->data['product_name'] }}</strong>
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
                <form action="{{route('delete.read.notifications')}}" method="POST">
                    @csrf
                    <strong>Are you sure you want to delete all read notifications?</strong><br>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete All</button>
                </form>
            </div>
        </div>
    </div>
</div>