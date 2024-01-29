<?php

namespace App\Http\Controllers\Dashboards\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index()
    {
        $notPaidOrders = Order::whereNull('deleted_at')->get();
        $paidOrders = Order::onlyTrashed()->get();
        return view('adminDashboard.cart.index', compact('notPaidOrders', 'paidOrders'));
    }





    public function destroy(Request $request)
    {
        $order = Order::withTrashed()->findOrFail($request->id);

        if ($order->trashed()) {

            toastr()->success('Order deleted successfully');
            $this->performForceDelete($order);
        } else {
            toastr()->success('Order deleted successfully');
            $this->performRegularDelete($order);
        }

        return redirect()->back();
    }



    private function performForceDelete(Order $order)
    {
        $orderDeleted = $this->forceDeleteOrder($order);
        if ($orderDeleted) {
            $this->deleteNotifications($order);
        }
    }



    private function deleteNotifications(Order $order)
    {
        DB::table('notifications')->where('data->cart_id', '=', $order->id)->delete();
    }





    private function forceDeleteOrder(Order $order)
    {
        return $order->forceDelete();
    }



    private function performRegularDelete(Order $order)
    {
        $orderDeleted = $order->forceDelete();
        if ($orderDeleted) {
            $this->deleteNotifications($order);
        }
    }




}
