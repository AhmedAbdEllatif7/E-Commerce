<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Customer\Address\CustomerAdderssController;
use App\Models\Customer_adderss;
use Illuminate\Http\Request;

class CustomerAddressController extends Controller
{
    public function show($id)
    {
        $customer_address = Customer_adderss::find($id);
        return view('pages.customer.customer_addreess', compact('customer_address'));
    }
}
