<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Customer_adderss;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Notifications\CartNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class CustomerOrderController extends Controller
{

    public function index()
    {
        $carts=Order::all();
        return view('pages.cart.index',[
            'carts'=>$carts,
            'categories'=>Category::all(),
            'products'=>Product::all()
        ]);
    }


    public function create()
    {
        $carts=Order::all();
        return view('Home.product-detail',[
            'carts'=>$carts,
            'categories'=>Category::all(),
            'products'=>Product::all(),

        ]);
    }


    public function store(Request $request)
    {

        // $products=Order::where('product_id',$product->id)->get();
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


        return redirect()->route('home')->with([
            'success' => 'Add To Cart'
        ]);

    }


    public function show($id)
    {
        $order=Order::find($id);
        return view('pages.cart.show',[
            'order'=>$order,
            'categories'=>Category::all(),
            'products'=>Product::all(),
        ]);
    }


    public function edit($id)
    {
        $order=Order::find($id);
        return view('pages.cart.edit',[
            'order'=>$order,
            'categories'=>Category::all(),
            'products'=>Product::all(),
        ]);
    }


//    public function update(Request $request, Order $order)
//    {
//        $order=Order::find($request->id);
//        $order->update([
//            'amount'=>$request->amount,
//            'quantity'=>$request->quantity,
//            'size'=>$request->size,
//            'color'=>$request->color
//        ]);
//        return redirect()->route('orders.index');
//    }


    public function destroy(Request $request)
    {
        $order = Order::findOrFail($request->id);
        $customer = auth()->guard('customer')->user();
        $order->notifications()->delete();

        $order->forceDelete();

        return redirect()->route('show-cart.index')->with([
            'success' => 'Delete Cart'
        ]);
    }

}
