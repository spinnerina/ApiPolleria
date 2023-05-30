<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FormaPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('FormaPago')->insert([
            'form_pago_descri' => 'Efectivo'
        ]);
        DB::table('FormaPago')->insert([
            'form_pago_descri' => 'Tarjeta de debito'
        ]);
        DB::table('FormaPago')->insert([
            'form_pago_descri' => 'Tarjeta de Credito'
        ]);
        DB::table('FormaPago')->insert([
            'form_pago_descri' => 'Transferencia'
        ]);
    }
}
