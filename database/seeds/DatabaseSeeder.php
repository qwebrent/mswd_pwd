<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
        $this->call(BarangaySeeder::class);
        $this->call(DisabilitySeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(CivstatusSeeder::class);
        $this->call(EducbgSeeder::class);
    }

}
