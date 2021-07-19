<?php

use Illuminate\Database\Seeder;
use App\CivilStatus;


class CivstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CivilStatus::create([
            'civil_status' => 'Single',
        ]);

        CivilStatus::create([
            'civil_status' => 'Married',
        ]);

        CivilStatus::create([
            'civil_status' => 'Widowed',
        ]);

        CivilStatus::create([
            'civil_status' => 'Separated',
        ]);

        CivilStatus::create([
            'civil_status' => 'Divorced',
        ]);
    }
}
