<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EdituserRequest extends FormRequest
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
            "firstname" => "required|alpha",
            "lastname" => "required|alpha",
            'email' => 'required|email',
            "phone" => "required|alpha_dash",
            "city" => "required|alpha",
            "zip" => "required|numeric",
            "street" => "required|alpha",
            "streetNumber" => "required|numeric"
        ];
    }
}
