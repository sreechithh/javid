<?php

namespace App\Http\Requests;

use App\Product;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $productId = $this->route('product');
        $rules = [
            'name' => 'required|unique:products,name,'.$productId,
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'amount' => 'required|numeric'
        ];

        return $rules;
    }
}
