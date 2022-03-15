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
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

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
        'lname' => $row['Last Name'],
        'fname' => $row['First Name'],
        'mname' => $row['Middle Name'],
        'suffix' => $row['Suffix'],
        'reg_num' => $row['Registration Number'],
        'weight' => $row['Weight'],
        'height' => $row['Height'],
        'b_day' => $row['Birthdate'],
        'gender_id' => $row['Gender'],
        'civstatus_id' => $row['Civil Status'],
        'mobile_num' => $row['Mobile Number'],
        'street_address' => $row['Street'],
        'barangay_id' => $row['Barangay'],
        'municipality' => $row['Municipality'],
        'province' => $row['Province'],
        'e_name' => $row['Contact Person'],
        'e_contact' => $row['Emergency Number'],
        'e_address' => $row['Emergency Address'],
        'senior_illness' => $row['Illness'],
        ]);
    }

    public function rules(): array {

        return [
            '*.Registration Number' => ['unique:seniors,reg_num']
        ];

    }


}
