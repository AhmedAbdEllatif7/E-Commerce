<?php

namespace App\Http\Controllers\Customer\Address;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCustomerAddressRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Customer_adderss;
use App\Models\Order;
use App\Models\Product;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomerAdderssController extends Controller
{

    public function index()
    {
        $costomer_address=Customer_adderss::where('customer_id', auth()->guard('customer')->user()->id)->get();
        $orders = Order::where('customer_id', auth()->guard('customer')->user()->id)->get();
        $totalAmount = 0;
        $randomProducts = Product::inRandomOrder()->limit(10)->get();

        foreach ($orders as $order) {
            $totalAmount += $order->amount * $order->quantity;
        }
        return view('Home.checkout',[
            'customer_address'=>$costomer_address,
            'categories'=>Category::all(),
            'countries'=>Country::all(),
            'cities'=>City::all(),
            'states'=>State::all(),
            'products'=>Product::all(),
            'orders'=>Order::all(),
            'totalAmount' => $totalAmount,
            'randomProducts' => $randomProducts,
        ]);
    }


    public function create()
    {

        $customer_address=Customer_adderss::all();
        return view('Home.checkout',[
            'customer_address'=>$customer_address,
            'categories'=>Category::all(),
            'countries'=>Country::all(),
            'cities'=>City::all(),
            'states'=>State::all()
        ]);
    }


    public function store(CreateCustomerAddressRequest $request)
    {
        $orders = Order::where('customer_id', auth()->guard('customer')->user()->id)->get();
        $totalAmount = 0;

        foreach ($orders as $order) {
            $totalAmount += $order->amount * $order->quantity;
        }
            Customer_adderss::create([
                'customer_id' => auth()->guard('customer')->user()->id,
                'country_id' => $request->countrie_id,
                'state_id' => $request->state_id,
                'city_id' => $request->citie_id,
                'address_title' => $request->address_title,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);

            return view('Home.payment', compact('orders', 'totalAmount'));

    }


    public function show()
    {
        $orders = Order::where('customer_id', auth()->guard('customer')->user()->id)->get();
        $totalAmount = 0;

        foreach ($orders as $order) {
            $totalAmount += $order->amount * $order->quantity;
        }
        return view('Home.payment' , compact('orders', 'totalAmount'));
    }


    public function edit(Customer_adderss $customer_adderss)
    {
        //
    }


    public function update(Request $request, Customer_adderss $customer_adderss)
    {
        //
    }


    public function destroy(Customer_adderss $customer_adderss)
    {
        //
    }
}
