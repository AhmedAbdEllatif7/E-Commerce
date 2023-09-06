<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $categories = Category::count();
        $products =  Product::count();
        $orders   = Order::count();
        $customers = Customer::count();

        $chartjs = app()->chartjs
            ->name('pieChartTest')
            ->type('pie')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Customer', 'Categories', 'Products', 'Orders'])
            ->datasets([
                [
                    'backgroundColor' => ['#FFC436', '#016A70', '#40128B', '#B70404'],
                    'hoverBackgroundColor' => ['#FFC436', '#016A70', '#40128B', '#B70404'],
                    'data' => [$customers, $categories, $products, $orders]
                ]
            ])
            ->options([]);


        return view('dashboard',[
            'categories'=>$categories,
            'products'=>$products,
            'chartjs' => $chartjs,
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


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
