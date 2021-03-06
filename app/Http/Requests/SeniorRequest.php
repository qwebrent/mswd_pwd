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
            'lname' => 'required|regex:/^[a-zA-Z ]+$/u|min:2,',
            'fname' => 'required|regex:/^[a-zA-Z ]+$/u|min:2,',
            'mname' => 'required|regex:/^[a-zA-Z ]+$/u|min:2,',
            'suffix' => 'nullable|regex:/^[a-zA-Z ]+$/u,',
            "height" => "required|numeric",
            "weight" => "required|numeric",
            "mobile_num" => "required|digits:11",
            "b_day" => "required|before:60 years ago",
            "reg_num" => "required|digits:12",
            'b_day' => 'required',
            'gender_id' => 'required',
            'civstatus_id' => 'required',
            'educbg_id' => 'required',
            'street_address' => 'required',
            'barangay_id' => 'required',
            'municipality' => 'required',
            'province' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'lname' => 'Last Name',
            'fname' => 'First Name',
            'mname' => 'Middle Name',
            'reg_num' => 'ID Number',
            'mobile_num' => 'Mobile Number',
            'b_day' => 'Birthday',
        ];
    }
}
