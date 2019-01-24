<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResponsabilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $responsabilities = ['Diretor', 'Professor', 'Secretário', 'Secretário de Educação'];
        foreach ($responsabilities as $r) {
          DB::table('responsabilities')->insert([
            'title' => $r
          ]);
        }
    }
}
