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
        Schema::create('Cliente', function (Blueprint $table) {
            $table->id('cli_id');
            $table->string('cli_nombre');
            $table->string('cli_mail')->nullable();
            $table->string('cli_telefono')->nullable();
            $table->string('cli_dni')->nullable();
            $table->string('cli_cuit')->nullable();
            $table->string('cli_direccion')->nullable();
            $table->boolean('cli_activo')->default(true);
            $table->unsignedBigInteger('loc_id')->nullable();
            
            $table->foreign('loc_id')
                  ->references('loc_id')
                  ->on('Localidad')
                  ->onDelete('set null');

            $table->unsignedBigInteger('iva_id')->nullable();

            $table->foreign('iva_id')
                  ->references('iva_id')
                  ->on('CondicionIva')
                  ->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cliente');
    }
};
