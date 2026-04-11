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
        'user_id' => 'required|exists:users,id',
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

        'user_id.required' => 'User wajib dipilih.',
        'user_id.exists' => 'User tidak valid.',
        ];
    }
}
