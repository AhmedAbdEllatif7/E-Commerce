<?php

namespace App\Http\Controllers\Dashboards\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Traits\AttachFilesTrait;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    use AttachFilesTrait;



    public function index()
    {
        $categories = Category::all();
        return view('adminDashboard.category.index', compact('categories'));
    }


    public function create()
    {
        return view('adminDashboard.category.create');
    }



    public function store(CategoryRequest $request)
    {
        $categoryData = $request->validated();

        if($request->file('image')){
        $categoryData['image'] = $this->uploadFile($request, 'image', 'categories');
        }

        $category = Category::create($categoryData);

        $category ? toastr()->success('Category created successfully') : toastr()->error('Failed to create category');
        return redirect()->route('category.index');
    }




    public function edit(Category $category)
    {
        return view('adminDashboard.category.edit', compact('category'));
    }




    public function update(Request $request , Category $category)
    {
        $this->updateCategoryName($category, $request->name);

        if ($request->hasFile('image')) {
            $this->processImageUpdate($category, $request);
        }

        toastr()->success('Category updated successfully');
        return redirect()->route('category.index');
    }



    private function updateCategoryName(Category $category, $newName)
    {
        $category->update(['name' => $newName]);
    }



    private function processImageUpdate(Category $category, $request)
    {
        $this->deleteFile('categories' , $category->image);

        $imageName = $this->uploadFile($request, 'image', 'categories');
        $category->image = $imageName;
        $category->save();
    }



    public function destroy(Category $category)
    {
        $this->deleteCategoryImage($category);
        $category->delete();

        toastr()->success('Category deleted successfully');
        return redirect()->back();
    }

    protected function deleteCategoryImage(Category $category)
    {
        // Check if the category has a photo and delete it
        if($category->image) {
            $this->deleteFile('categories', $category->image);
        }
    }
}
