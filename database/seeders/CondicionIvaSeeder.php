<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CondicionIvaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('CondicionIva')->insert([
            'iva_descripcion' => 'Responsable Inscripto',
            'iva_letra' => 'A',
            'iva_habilitado' => 1
        ]);
        DB::table('CondicionIva')->insert([
            'iva_descripcion' => 'Responsable No Inscripto',
            'iva_letra' => 'A',
            'iva_habilitado' => 1
        ]);
        DB::table('CondicionIva')->insert([
            'iva_descripcion' => 'No Responsable',
            'iva_letra' => 'A',
            'iva_habilitado' => 1
        ]);
        DB::table('CondicionIva')->insert([
            'iva_descripcion' => 'Sujeto Exento',
            'iva_letra' => 'A',
            'iva_habilitado' => 1
        ]);
        DB::table('CondicionIva')->insert([
            'iva_descripcion' => 'Consumidor Final',
            'iva_letra' => 'A',
            'iva_habilitado' => 1
        ]);
        DB::table('CondicionIva')->insert([
            'iva_descripcion' => 'Responsable Monotributo',
            'iva_letra' => 'A',
            'iva_habilitado' => 1
        ]);
        DB::table('CondicionIva')->insert([
            'iva_descripcion' => 'Sujeto no Categorizado',
            'iva_letra' => 'A',
            'iva_habilitado' => 1
        ]);
        DB::table('CondicionIva')->insert([
            'iva_descripcion' => 'Proveedor de Exterior',
            'iva_letra' => 'A',
            'iva_habilitado' => 1
        ]);
        DB::table('CondicionIva')->insert([
            'iva_descripcion' => 'Cliente del Exterior',
            'iva_letra' => 'A',
            'iva_habilitado' => 1
        ]);
        DB::table('CondicionIva')->insert([
            'iva_descripcion' => 'Liberado',
            'iva_letra' => 'A',
            'iva_habilitado' => 1
        ]);
        DB::table('CondicionIva')->insert([
            'iva_descripcion' => 'Responsable Inscripto - Agente de Percepción',
            'iva_letra' => 'A',
            'iva_habilitado' => 0
        ]);
        DB::table('CondicionIva')->insert([
            'iva_descripcion' => 'Pequeño Contribuyente Eventual',
            'iva_letra' => 'A',
            'iva_habilitado' => 1
        ]);
        DB::table('CondicionIva')->insert([
            'iva_descripcion' => 'Monotributista Social',
            'iva_letra' => 'A',
            'iva_habilitado' => 1
        ]);
        DB::table('CondicionIva')->insert([
            'iva_descripcion' => 'Pequeño Contribuyente Eventual Social',
            'iva_letra' => 'A',
            'iva_habilitado' => 0
        ]);
    }
}
