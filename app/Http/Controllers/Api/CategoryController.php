<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Product;
use App\Traits\ResponseTrait;

class CategoryController
{
    use ResponseTrait;

    public function index()
    {
        $categories = Category::latest()->paginate(10);

        return $this->successResponse('Categories Retrieved Successfully', $categories);
    }

    public function store(CategoryRequest $request)
    {
        $request->validated();
        $category = Category::create($request->all());

        return $this->successResponse('Category Saved Successfully', $category);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return $this->successResponse('Category Retrieved Successfully', $category);
    }

    public function update(CategoryRequest $request, $id)
    {
        $request->validated();
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return $this->successResponse('Category Updated Successfully', $category);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if(!Product::where('category_id', $id)->exists()) {
            $category->delete();
            return $this->successResponse('Category Deleted Successfully');
        }
        
        return $this->errorResponse('Category already exists for products');
    }
}
