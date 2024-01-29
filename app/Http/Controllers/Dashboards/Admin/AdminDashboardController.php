<?php

namespace App\Http\Controllers\Dashboards\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;

class AdminDashboardController extends Controller
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


        return view('adminDashboard.dashboard',[
            'categories'=>$categories,
            'products'=>$products,
            'chartjs' => $chartjs,
        ]);
    }



}
