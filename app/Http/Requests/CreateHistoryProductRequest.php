<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateHistoryProductRequest extends FormRequest
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
            'type' => 'required|string',
            'product_id' => 'required|string',
            'stock' => 'required|numeric',
        ];
    }

     /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'type.required' => 'Type is required.',
            'type.string' => 'Type must be a string.',
            'product_id.required' => 'Product Id is required.',
            'product_id.string' => 'Product Id must be a string.',
            'stock.required' => 'Stock is required.',
            'stock.numeric' => 'Stock must be a number.',
        ];
    }
}
