<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StuffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stuffs = ['Português', 'Matemática', 'Geografia', 'Física', 'Química', 'Literatura', 'Educação Física'];
        foreach ($stuffs as $s) {
          DB::table('stuffs')->insert([
            'title' => $s
          ]);
        }
    }
}
