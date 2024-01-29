<?php

namespace App\Http\Controllers\Dashboards\Customer\Wishlist;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WishlistController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:customer');
    }

    public function addToWishlist(Request $request)
    {
        $customer_id = auth()->guard('customer')->user()->id;

        $validator = $request->validate([
            'product_id' => [
                'required',
                Rule::unique('wishlists')->where(function ($query) use ($customer_id) {
                    return $query->where('customer_id', $customer_id);
                }),
            ],
        ]);


        $wishlistItem = new Wishlist();
        $wishlistItem->customer_id = auth()->guard('customer')->user()->id;
        $wishlistItem->product_id = $request->product_id;

        $wishlistItem->save();
        
    }


    public function showWishlist()
    {
        $customer = auth()->guard('customer')->user();
        $wishlistOfCustomer = $customer->wishlist;

        $productIdsInWishlist = $wishlistOfCustomer->pluck('product_id');

        $productsInWishlist = Product::whereIn('id', $productIdsInWishlist)->get();

        return view('home.wishlist' , compact('productsInWishlist'));

    }


    public function deleteItem(Request $request, $itemId)
    {

        Wishlist::where('product_id', $itemId)->delete();

        toastr()->success('deleted from your fav successfully');
        return redirect()->back();
    }






}
