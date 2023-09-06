<?php

namespace App\Http\Controllers\Customer\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)  {
        $products=Product::where('category_id',$id)->paginate(9);
        return view('Home.product-list',[

            'products'=>$products,
            'categories'=>Category::all(),
            'showProduct'=>Product::all(),
            'categoryId' => $id,
        ]);
    }


    public function filterProducts(Request $request)
    {
        $priceRange = $request->input('price_range');

        $products = Product::where('category_id', $request->categoryId)
            ->when($priceRange == 1, function ($query) {
                return $query->whereBetween('price', [1, 100]);
            })
            ->when($priceRange == 2, function ($query) {
                return $query->whereBetween('price', [100, 5000]);
            })
            ->when($priceRange == 3, function ($query) {
                return $query->whereBetween('price', [5000, 10000]);
            })
            ->get(); // Adjust the pagination size as needed

        return view('Home.product-list', [
            'products' => $products,
            'categories' => Category::all(),
            'showProduct' => Product::all(),
            'categoryId' => $request->categoryId,
        ]);

    }

    public function showAll()
    {
        $categories = Category::all();
        return view('Home.categories', compact('categories'));
    }
}
