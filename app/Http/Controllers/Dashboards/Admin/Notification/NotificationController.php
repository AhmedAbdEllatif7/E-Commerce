<?php

namespace App\Http\Controllers\Dashboards\Admin\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function readNotification($id)
    {
        $notification = Auth::user()->unreadNotifications()->findOrFail($id);

        if ($notification) {
            $notification->markAsRead();

            toastr()->success('Notification marked as read');
            return redirect()->back();
        } else {
            toastr()->error('Notification not found or you do not have permission to mark it as read');
            return redirect()->back();
        }
    }



    public function readAllNotification()
    {
        $notifications = Auth::user()->unreadNotifications()->get();

        if ($notifications->isEmpty()) {
            toastr()->error('No unread notifications to mark as read');
            return redirect()->back();
        }

        foreach ($notifications as $notification) {
            $notification->markAsRead();
        }
        toastr()->success('All notifications marked as read');
        return redirect()->back();
    }



    public function deleteReadNotification()
    {
        $allReadNotifications = Auth::user()->readNotifications()->get();
        if($allReadNotifications)
        {
            foreach ($allReadNotifications as $notification) {
                $notification->delete();
            }
            toastr()->success('All read notifications are deleted');
            return redirect()->back();
        }
        else{
            toastr()->error('No read notifications found');
            return redirect()->back();
        }
    }

}
