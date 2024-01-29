<?php

namespace App\Http\Controllers\Dashboards\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Traits\AttachFilesTrait;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
use AttachFilesTrait;

    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $productsPaginate = Product::paginate(5);

        return view('adminDashboard.product.index',compact('categories' , 'productsPaginate' , 'products'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('adminDashboard.product.create',compact('categories'));
    }


    public function store(ProductRequest $request)
    {
        $productData = $request->validated();

        if($request->file('image')){
            $productData['image'] = $this->uploadFile($request, 'image', 'products');
        }

        $product = Product::create($productData);

        $product ? toastr()->success('Product created successfully') : toastr()->error('Failed to create product');
        ;
        return redirect()->route('products.index');
    }



    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('adminDashboard.product.edit', compact('product' , 'categories'));
    }


    public function update(ProductRequest $request, Product $product)
    {
        $productData = $request->validated();

        if ($request->hasFile('image')) {
            $productData['image'] = $this->processImageUpdate($product, $request);
        }

        $this->updateProduct($product, $productData);

        toastr()->success('Product updated successfully');
        return redirect()->route('products.index');
    }

    private function updateProduct(Product $product, array $productData)
    {
        $product->update($productData);
    }

    private function processImageUpdate(Product $product, ProductRequest $request): string
    {
        $this->deleteFile('products', $product->image);

        $imageName = $this->uploadFile($request, 'image', 'products');
        
        // Update the 'image' column with the new image name
        $product->image = $imageName;
        $product->save();

        return $imageName; // Return the new image name
    }



    
    public function destroy(Product $product)
    {
        $this->deleteProductImage($product);
        $product->delete();

        toastr()->success('Product deleted successfully');
        return redirect()->back();
    }

    protected function deleteProductImage(Product $product)
    {
        // Check if the products has a photo and delete it
        if($product->image) {
            $this->deleteFile('products', $product->image);
        }
    }

}
