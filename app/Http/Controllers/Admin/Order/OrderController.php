<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index()
    {
        $NotDeletedOrders = Order::whereNull('deleted_at')->get();
        $PaidOrders = Order::onlyTrashed()->get(); // Retrieve only soft deleted orders

        return view('pages.cart.index', compact('NotDeletedOrders', 'PaidOrders'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(Request $request)
    {
        $order = Order::withTrashed()->findOrFail($request->id);

        if ($order->trashed()) {
            // Soft deleted order, so use forceDelete
            DB::table('notifications')->where('data->cart_id', '=', $order->id)->delete();

            if ($order->customerAddress()->exists()) {
                $order->customerAddress->forceDelete();
            }

            $order->forceDelete();
            toastr()->success('Order has been permanently deleted!');
        } else {
            // Regular delete for non-soft-deleted order
            DB::table('notifications')->where('data->cart_id', '=', $order->id)->delete();

            if ($order->customerAddress()->exists()) {
                $order->customerAddress->delete();
            }

            $order->forceDelete();
            toastr()->success('Order has been deleted successfully!');
        }

        return redirect()->back();


    }
}
