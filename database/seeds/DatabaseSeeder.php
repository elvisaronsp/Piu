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
        $this->call(ResponsabilitiesTableSeeder::class);
        $this->call(StuffsTableSeeder::class);
        $this->call(UnitsTableSeeder::class);
        $this->call(BouncerSeeder::class);
    }
}
