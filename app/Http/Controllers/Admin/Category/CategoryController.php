<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Traits\AttachFilesTrait;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    use AttachFilesTrait;
    public function index()
    {
        $categories = Category::all();
        return view('pages.category.index',[
            'categories'=>$categories
        ]);
    }


    public function create()
    {
        return view('pages.category.create');
    }


    public function store(Request $request)
    {
        Category::create([
            'name'=>$request->name,
            'image'=>$request->file('image')->getClientOriginalName(),

        ]);
        $this->uploadFile($request,'image','upload_attachments');
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('category.index');
    }


    public function show($id)  {
        $products=Product::where('category_id',$id)->get();
        return view('Home.product-list',[

            'products'=>$products,
            'categories'=>Category::all(),
            'showProduct'=>Product::all(),
        ]);
    }


    public function edit($id)
    {
        $category=Category::find($id);
        return view('pages.category.edit',[
            'category'=>$category
        ]);
    }


    public function update(Request $request)
    {
        $category = Category::find($request->id);

        if (!$category) {
            return redirect()->route('category.index')->with('error', 'Category not found.');
        }

        $category->update([
            'name' => $request->name,
        ]);

        if ($request->hasFile('image')) {
            $this->deleteFile($category->image);

            $this->uploadFile($request, 'image', 'upload_attachments');

            $image_new = $request->file('image')->getClientOriginalName();
            $category->image = $image_new; // Always update the image

            // Optionally, you could also consider checking if $category->image !== $image_new
            // and then updating the image if it has changed.
        }

        $category->save();

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }



    public function destroy(Request $request)
    {
        $category=Category::find($request->id);
        $category->destroy($request->id);
        return redirect()->back();
    }
}
