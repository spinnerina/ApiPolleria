<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\EmpresaSeeder;
use Database\Seeders\UsuarioSeeder;
use Database\Seeders\FormaPagoSeeder;
use Database\Seeders\LocalidadSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Llamo a los seeders
        $this->call(UsuarioSeeder::class);
        $this->call(LocalidadSeeder::class);
        $this->call(FormaPagoSeeder::class);
        $this->call(EmpresaSeeder::class);
    }
}
