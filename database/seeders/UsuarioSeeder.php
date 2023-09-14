<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Usuario')->insert([
            'usu_login' => 'administrador',
            'usu_contrasenia' => Hash::make('mati2001'),
            'usu_nombre' => 'Administrador',
            'usu_mail' => 'mati.fessia.2001@gmail.com',
        ]);

        DB::table('Usuario')->insert([
            'usu_login' => 'empleado',
            'usu_contrasenia' => Hash::make('1234'),
            'usu_nombre' => 'Empleado',
            'usu_mail' => 'empleado@gmail.com',
            'usu_permiso' => false
        ]);

        DB::table('Usuario')->insert([
            'usu_login' => '',
            'usu_contrasenia' => Hash::make(''),
            'usu_nombre' => 'Pablo Javier Fessia',
            'usu_mail' => 'hfingenieria.sas@hotmail.com',
            'usu_permiso' => true
        ]);
        
        DB::table('Usuario')->insert([
            'usu_login' => '',
            'usu_contrasenia' => Hash::make(''),
            'usu_nombre' => 'Patricia Huppi',
            'usu_mail' => 'hfingenieria.sas@hotmail.com',
            'usu_permiso' => true
        ]);
    }
}
