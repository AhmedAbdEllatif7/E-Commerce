<?php

namespace App\Http\Controllers\Dashboards\Customer\Address;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCustomerAddressRequest;
use App\Models\Category;
use App\Models\CustomerAdderss;
use App\Models\Order;
use App\Models\Product;


class CustomerAdderssController extends Controller
{

    public function index()
    {
        $costomer_address = CustomerAdderss::where('customer_id', auth()->guard('customer')->user()->id)->get();
        $orders = Order::where('customer_id', auth()->guard('customer')->user()->id)->get();
        $totalAmount = 0;
        $randomProducts = Product::inRandomOrder()->limit(10)->get();

        foreach ($orders as $order) {
            $totalAmount += $order->amount * $order->quantity;
        }
        return view('home.checkout',[
            'customer_address'=>$costomer_address,
            'categories'=>Category::all(),
            'products'=>Product::all(),
            'orders'=>Order::all(),
            'totalAmount' => $totalAmount,
            'randomProducts' => $randomProducts,
        ]);
    }


    public function create()
    {

        $customer_address = CustomerAdderss::all();
        return view('home.checkout',[
            'customer_address'=>$customer_address,
            'categories'=>Category::all(),
        ]);
    }


    public function store(CreateCustomerAddressRequest $request)
    {
        $orders = Order::where('customer_id', auth()->guard('customer')->user()->id)->get();
        $totalAmount = 0;

        foreach ($orders as $order) {
            $totalAmount += $order->amount * $order->quantity;
        }
        CustomerAdderss::create([
                'customer_id' => auth()->guard('customer')->user()->id,
                'address_title' => $request->address_title,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);

            return view('home.payment', compact('orders', 'totalAmount'));
    }


    public function show()
    {
        $orders = Order::where('customer_id', auth()->guard('customer')->user()->id)->get();
        $totalAmount = 0;

        foreach ($orders as $order) {
            $totalAmount += $order->amount * $order->quantity;
        }
        return view('home.payment' , compact('orders', 'totalAmount'));
    }


}
