<?php

use Illuminate\Database\Seeder;
use App\Educbg;


class EducbgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Educbg::create([
            'educ_bg' => 'No Schooling Completed',
        ]);

        Educbg::create([
            'educ_bg' => 'Elementary Graduate',
        ]);

        Educbg::create([
            'educ_bg' => 'High School Graduate',
        ]);

        Educbg::create([
            'educ_bg' => 'College Graduate',
        ]);
    }
}
