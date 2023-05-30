<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Empresa')->insert([
            'emp_nombre' => 'Polleria Galletto Rosso',
            'emp_direccion' => 'San Luis 579',
            'loc_id' => 1
        ]);
    }
}
