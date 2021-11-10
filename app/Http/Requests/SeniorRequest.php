<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeniorRequest extends FormRequest
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
            "height" => "required|numeric",
            "weight" => "required|numeric",
            "mobile_num" => "required|digits:11",
            "b_day" => "required|date|before:60 years ago"
        ];
    }
}
