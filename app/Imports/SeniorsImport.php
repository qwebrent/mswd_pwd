<?php

namespace App\Imports;

use App\Senior;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;

class SeniorsImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Senior([
        'lname' => $row['last_name'],
        'fname' => $row['first_name'],
        'mname' => $row['middle_name'],
        'reg_num' => $row['registration'],
        'weight' => $row['weight'],
        'height' => $row['height'],
        'b_day' => $row['birthday'],
        'gender_id' => $row['gender'],
        'civstatus_id' => $row['civil_status'],
        'mobile_num' => $row['mobile_number'],
        'street_address' => $row['street'],
        'barangay_id' => $row['barangay'],
        'municipality' => $row['municipality'],
        'province' => $row['province'],
        'e_name' => $row['ename'],
        'e_contact' => $row['econtact'],
        'e_address' => $row['eaddress'],
        'senior_illness' => $row['illness'],
        ]);
    }

    public function rules(): array {

        return [
            '*.registration' => ['unique:seniors,reg_num']
        ];

    }


}
