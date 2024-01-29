<?php

namespace App\Http\Controllers\Dashboards\Customer\Cart;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShowOrderController extends Controller
{

    public function index()
    {
        $orders = Order::where('customer_id', auth()->guard('customer')->user()->id)->where('payment_status' , 0)->get();
        $randomProducts = Product::inRandomOrder()->limit(10)->get();
        $totalAmount = 0;

        foreach ($orders as $order) {
            $totalAmount += $order->amount * $order->quantity;
        }

        return view('home.cart', [
            'orders' => $orders,
            'categories' => Category::all(),
            'products' => Product::all(),
            'totalAmount' => $totalAmount,
            'randomProducts' => $randomProducts,
        ]);
    }

}
