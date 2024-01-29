<?php

namespace App\Http\Controllers\Dashboards\Admin\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
    $customers = Customer::all();
    return view('adminDashboard.customers.index', compact('customers'));
    }


    public function create()
    {
        return view('adminDashboard.customers.create');
    }


    public function store(EditCustomerRequest $request)
    {
        $validatedData = $request->validated();
    
        $customer = $this->createCustomer($validatedData, $request);
        $this->createCustomerAddress($customer, $validatedData);
    
        toastr()->success('Customer created successfully');
        return redirect()->route('customers.index');
    }
    
    protected function createCustomer(array $data, $request)
    {
        return Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($request->password),
        ]);
    }
    
    protected function createCustomerAddress(Customer $customer, array $data)
    {
        $customer->customerAddress()->create([
            'phone' => $data['phone'],
            'address_title' => $data['address_title'],
            'address' => $data['address'],
        ]);
    }
    

    public function edit(Customer $customer)
    {
        return view('adminDashboard.customers.edit', compact('customer'));
    }


    /******************** begin update ******************************/
    public function update(EditCustomerRequest $request, Customer $customer)
    {
        $validatedData = $request->validated();
    
        $this->updateCustomer($customer, $validatedData);
        $this->updateCustomerAddress($customer, $validatedData);
    
        toastr()->success('Customer updated successfully');
        return redirect()->route('customers.index');
    }
    
    protected function updateCustomer(Customer $customer, array $data)
    {
        $customer->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);
    }
    
    protected function updateCustomerAddress(Customer $customer, array $data)
    {
        $customer->customerAddress()->update([
            'phone' => $data['phone'],
            'address_title' => $data['address_title'],
            'address' => $data['address'],
        ]);
    }
    /********************** end update ******************************/
    

    public function destroy(Customer $customer)
    {
        $customer->customerAddress()->delete();
        $customer->delete();

        toastr()->success('Customer deleted successfully');
        return back();
    }
}
