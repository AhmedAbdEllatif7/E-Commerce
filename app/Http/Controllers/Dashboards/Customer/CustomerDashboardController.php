<?php

namespace App\Http\Controllers\Dashboards\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class CustomerDashboardController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $randomProducts = Product::inRandomOrder()->limit(10)->get();
        $recentProducts = Product::latest()->take(4)->get();

        return view('home.dashboard',[
            'categories'=>$categories,
            'randomProducts'=>$randomProducts,
            'recentProducts'=>$recentProducts,
        ]);
    }

}
