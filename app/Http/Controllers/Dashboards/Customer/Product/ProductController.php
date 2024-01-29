<?php

namespace App\Http\Controllers\Dashboards\Customer\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function show($id)
    {
        $categories1 = Category::all();
        $product = Product::find($id);
        $categories = $product->categories;
        $products = $categories->products; // Retrieve products associated with the categories


        return view('home.products.productDetails',[
            'product'=>$product,
            'categories'=>$categories1,
            'products'=>$products,
//            'carts'=>Order::all(),
            'costomer'=>Customer::all(),
        ]);
    }


    public  function showAll()
    {
        $products = Product::paginate(9);
        $categories = Category::all();
        $showProduct = Product::all();
        return view('home.products.index' , compact('products' , 'categories' , 'showProduct' ));
    }


    public function filterProducts(Request $request)
    {
        $priceRange = $request->input('price_range');

        $products = Product::query()
            ->when($priceRange == 1, function ($query) {
                return $query->whereBetween('price', [1, 100]);
            })
            ->when($priceRange == 2, function ($query) {
                return $query->whereBetween('price', [100, 5000]);
            })
            ->when($priceRange == 3, function ($query) {
                return $query->whereBetween('price', [5000, 10000]);
            })
            ->paginate(9) ;// Adjust the pagination size as needed

        return view('home.products.index', compact('products'));
    }


    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'query' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $query = $request->input('query');

        $products = Product::where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->paginate(6);

        return view('home.products.index', ['products' => $products]);
    }


}
