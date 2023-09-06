<?php

namespace App\Http\Controllers\Customer\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardCustomerController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $randomProducts = Product::inRandomOrder()->limit(10)->get();
        $recentProducts = Product::latest()->take(4)->get();

        return view('Home.index',[
            'categories'=>$categories,
            'randomProducts'=>$randomProducts,
            'recentProducts'=>$recentProducts,
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
