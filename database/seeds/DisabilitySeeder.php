<?php

use Illuminate\Database\Seeder;
use App\Disability;

class DisabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Disability::create([
            'pwd_disability' => 'Physical',
        ]);

        Disability::create([
            'pwd_disability' => 'Mental Health',
        ]);

        Disability::create([
            'pwd_disability' => 'Visual',
        ]);

        Disability::create([
            'pwd_disability' => 'Hearing',
        ]);

        Disability::create([
            'pwd_disability' => 'Intellectual',
        ]);

        Disability::create([
            'pwd_disability' => 'Learning',
        ]);
    }
}
