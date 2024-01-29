<?php

namespace App\Http\Controllers\Dashboards\Admin\customerAddress;

use App\Http\Controllers\Controller;
use App\Models\CustomerAdderss;
use App\Models\Order;

class CustomerAddressController extends Controller
{
    public function show($id)
    {
        $order = Order::withTrashed()->find($id);
        $customerAddress = CustomerAdderss::where('address_title' , '=' , $order->address_title)->first();
        return view('adminDashboard.showCustomerAddress.index', compact('customerAddress'));
    }
}
