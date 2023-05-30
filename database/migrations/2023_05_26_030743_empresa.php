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
        Schema::create('Empresa', function (Blueprint $table) {
            $table->id('emp_id');
            $table->string('emp_nombre');
            $table->string('emp_cuit')->nullable(); //Cambiar en un futuro, ahora no tengo el cuit
            $table->string('emp_img')->nullable();
            $table->string('emp_direccion');
            $table->unsignedBigInteger('loc_id')->nullable();

            $table->foreign('loc_id')
                  ->references('loc_id')
                  ->on('Localidad')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Empresa');
    }
};
