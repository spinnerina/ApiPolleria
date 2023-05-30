<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LocalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Localidad')->insert([
            'loc_nombre' => 'Villa Maria',
            'loc_codpostal' => 5900,
            'loc_provincia' => 'Córdoba',
        ]);

        DB::table('Localidad')->insert([
            'loc_nombre' => 'Villa Nueva',
            'loc_codpostal' => 5903,
            'loc_provincia' => 'Córdoba',
        ]);
    }
}
