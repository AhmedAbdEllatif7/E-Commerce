<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{

    public function index()
    {
        $customers=Customer::all();
        return view('pages.customer.index', compact('customers'));
    }


    public function create()
    {
        return view('pages.customer.create');
    }


    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:'],
        //     'password' => ['required', 'confirmed', Password::defaults()],
        // ]);

        Customer::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'adders'=>$request->adders,
            'password' => Hash::make($request->password),

        ]);
        return redirect()->route('customer.index');
    }

    public function show(Customer $customer)
    {
        //
    }


    public function edit($id)
    {
        $customer=Customer::find($id);

        return view('pages.customer.edit',[
            'customer'=>$customer
        ]);
    }


    public function update(Request $request)
    {
        $costomer=Customer::find($request->id);
        $costomer->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'adders'=>$request->adders,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('customer.index');
    }


    public function destroy(Request $request)
    {
        $customer=Customer::destroy($request->id);
        return redirect()->back();
    }
}
