<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ProductRequest;
use App\Product;
use App\Traits\ResponseTrait;

class ProductController
{
    use ResponseTrait;

    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);

        return $this->successResponse('Products Retrieved Successfully', $products);
    }

    public function store(ProductRequest $request)
    {
        $request->validated();
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $inputs['image'] = $request->file('image')->store('image', 'public');
        }
        $product = Product::create($inputs);

        return $this->successResponse('Product Saved Successfully', $product);
    }

    public function edit($id)
    {
        $product = Product::with('category')->findOrFail($id);

        return $this->successResponse('Product Retrieved Successfully', $product);
    }

    public function update(ProductRequest $request, $id)
    {        
        $request->validated();
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $inputs['image'] = $request->file('image')->store('image', 'public');
        }
        $product = Product::findOrFail($id);
        $product->update($inputs);

        return $this->successResponse('Product Updated Successfully', $product);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return $this->successResponse('Product Deleted Successfully');
    }
}
