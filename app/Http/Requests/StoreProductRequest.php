<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
        'name' => 'required|string|max:255',
        'quantity' => 'required|integer',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
    ];
}

public function messages(): array
{
    return [
        'name.required' => 'Nama produk wajib diisi.',
        'name.max' => 'Nama produk tidak boleh lebih dari 255 karakter.',

        'quantity.required' => 'Jumlah produk wajib diisi.',
        'quantity.integer' => 'Jumlah harus angka bulat.',

        'price.required' => 'Harga wajib diisi.',
        'price.numeric' => 'Harga harus angka.',

        'category_id.required' => 'Kategori wajib dipilih.',
        'category_id.exists' => 'Kategori tidak valid.',
        ];
    }
}
