<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedor', function (Blueprint $table) {
            $table->id('prov_id');
            $table->string('prov_nombre');
            $table->string('prov_telefono');
            $table->string('prov_direccion');
            $table->timestamps();
            $table->unsignedBigInteger('loc_id')->nullable();
            
            $table->foreign('loc_id')
                  ->references('loc_id')
                  ->on('Localidad')
                  ->onDelete('set null');

            $table->date('prov_fecha_pag');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedor');
    }
};
