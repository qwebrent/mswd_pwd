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
            'mobile_num' => 'required|digits:11',
            'sss_num' => 'required|digits:10',
            'phealth_num' => 'required|digits:12',
            'reg_num' => 'required|digits:12',
            'lname' => 'required|min:2',
            'fname' => 'required|min:2',
            'mname' => 'required|min:2',
            'b_day' => 'required',
            'gender_id' => 'required',
            'civstatus_id' => 'required',
            'educbg_id' => 'required',
            'street_address' => 'required',
            'barangay_id' => 'required',
            'municipality' => 'required',
            'province' => 'required',
            'emp_status' => 'required',
            'emp_type' => 'required',
            'pwd_skill' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'lname' => 'Last Name',
            'fname' => 'First Name',
            'mname' => 'Middle Name',
            'reg_num' => 'ID Number',
            'sss_num' => 'SSS Number',
            'phealth_num' => 'Phil Health Number',
        ];
    }
}
