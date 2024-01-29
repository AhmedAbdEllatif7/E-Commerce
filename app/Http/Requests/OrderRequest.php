<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
        
            'category_id' => ['required', 'integer'],
            'product_id' => ['required', 'integer'],
            'amount' => ['required', 'numeric'],
            'quantity' => ['required', 'integer'],
            'size' => ['nullable', 'string'],
            'color' => ['nullable', 'string'],
        ];
    }
}
