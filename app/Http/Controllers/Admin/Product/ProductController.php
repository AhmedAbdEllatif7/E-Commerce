<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Traits\AttachFilesTrait;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
use AttachFilesTrait;
    public function index()
    {
        $products=Product::all();
        $products=Product::paginate(5);

        return view('pages.product.index',[
            'products'=>$products,
            'categories'=>Category::all()
        ]);
    }


    public function create()
    {
        return view('pages.product.create',[
            'categories'=>Category::all()
        ]);
    }


    public function store(Request $request)
    {
        Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$request->file('image')->getClientOriginalName(),
            'price'=>$request->price,
            'discount_price'=>$request->descount_price,
            'category_id'=>$request->categorie_id
        ]);
        $this->uploadFile($request,'image','upload_attachments');

        session()->flash('success','The Product Add success');
        return redirect()->route('product.index');
    }


    public function show($id)
    {
        $categories=Category::all();
        $product=Product::find($id);
        return view('Home.product-detail',[
            'product'=>$product,
            'categories'=>$categories,
            'products'=>Product::all(),
//            'carts'=>Order::all(),
            'costomer'=>Customer::all()
        ]);
    }


    public function edit($id)
    {
        $product=Product::find($id);
        return view('pages.product.edit',[
            'product'=>$product,
            'categories'=>Category::all()

        ]);
    }


    public function update(Request $request, Product $product)
    {
        $productToUpdate = Product::find($product->id);

        if (!$productToUpdate) {
            return redirect()->route('product.index')->with('error', 'Product not found.');
        }

        $productToUpdate->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'discount_price' => $request->descount_price,
            'category_id' => $request->categorie_id,
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image from the public folder
            $this->deleteFile($productToUpdate->image);

            $this->uploadFile($request, 'image', 'upload_attachments');
            $image_new = $request->file('image')->getClientOriginalName();
            $productToUpdate->image = $productToUpdate->image !== $image_new ? $image_new : $productToUpdate->image;
        }

        $productToUpdate->save();

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }



    public function destroy(Request $request)
    {
        $this->deleteFile($request->file_name);
        $product=Product::find($request->id);
        $product->destroy($request->id);
        return redirect()->back()->with([
            'success'=>'Product DELETE'
        ]);
    }
}
