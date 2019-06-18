<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateItemRequest extends FormRequest
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
        return [
            'title' => 'required|max:254',
            'description' => 'required',
            'quantity' => 'required|numeric',
            'category' => 'required|max:254'
        ];
    }

    /**
     * Set the validation message
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Judul barang tidak boleh kosong.',
            'title.max' => 'Judul barang terlalu panjang.',
            'description.required' => 'Deskripsi barang tidak boleh kosong.',
            'quantity.required' => 'Jumlah barang tidak boleh kosong.',
            'quantity.numeric' => 'Jumlah barang harus dalam bentuk angka.',
        ];
    }
}
