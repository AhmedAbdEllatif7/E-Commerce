<?php

namespace App\Http\Controllers\Dashboards\Customer\Order;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Notifications\CartNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class CustomerOrderController extends Controller
{

    public function create()
    {
        $carts = Order::all();
        return view('home.products.productDetails',[
            'carts' => $carts,
            'categories' => Category::all(),
            'products' => Product::all(),
        ]);
    }


    public function store(Request $request)
    {
        $cart=Order::create([
            'customer_id'=>auth('customer')->user()->id,
            'category_id'=>$request->category_id,
            'product_id'=>$request->product_id,
            'amount'=>$request->amount,
            'quantity'=>$request->quantity,
            'size'=>$request->size,
            'color'=>$request->color,
            'payment_status'=>false,
        ]);
        $users = Customer::where('id', '=', auth('customer')->user()->id)->get();
        $creator = auth('customer')->user()->name;
        $message = $creator . ' create new order ' .  $cart->products->name;

        Notification::send($users, new CartNotification($cart->id, $creator, $cart->products->name , $message));

        toastr()->success('Product added to cart successfully');
        return redirect()->back();
    }






    public function destroy(Request $request)
    {
        $order = Order::findOrFail($request->id);
        $order->notifications()->delete();

        $order->forceDelete();

        toastr()->success('Order deleted successfully');
        return redirect()->route('show-cart.index');
    }

}
