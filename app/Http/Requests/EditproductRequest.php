<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditproductRequest extends FormRequest
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
            "title" => "required",
            "description" => "required",
            'price' => 'required|numeric',
            "image" => "image|mimes:jpeg,jpg,png,svg,gif",
            "category" => "required",
            "action" => "required",
        ];
    }
}
