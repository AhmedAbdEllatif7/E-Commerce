<?php

namespace App\Http\Controllers\Customer\Cart;

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

        return view('Home.cart', [
            'orders' => $orders,
            'categories' => Category::all(),
            'products' => Product::all(),
            'totalAmount' => $totalAmount,
            'randomProducts' => $randomProducts,
        ]);
    }



    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {


    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Order $order,Request $request)
    {

    }
}
