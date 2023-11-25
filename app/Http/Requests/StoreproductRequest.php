<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreproductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_name' => 'required|string|max:255',
            'product_code' => 'required|unique:products,product_code|string|min:4|max:4',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required|string',
        ];
    }
    public function messages(): array
{
    return [
        'product_code.unique' => 'code produk sudah ada',
    ];
}
}
