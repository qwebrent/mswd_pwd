<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PWDRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lname' => ['required', 'min:2'],
            'fname' => ['required', 'min:2'],
            'mname' => ['required', 'min:2'],
            'reg_num' => ['required', 'digits:12'],
            'sss_num' => 'required',
            'phealth_num' => ['required', 'digits:12'],
            'b_day' => 'required',
            'gender_id' => 'required',
            'civstatus_id' => 'required',
            'educbg_id' => 'required',
            'mobile_num' => ['required', 'digits:2'],
            'street_address' => 'required',
            'barangay_id' => 'required',
            'municipality' => 'required',
            'province' => 'required',
            'emp_status' => 'required',
            'emp_type' => 'required',
            'pwd_skill' => 'required',
        ];
    }
}
