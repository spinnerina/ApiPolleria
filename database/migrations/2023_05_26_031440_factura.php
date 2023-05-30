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
        Schema::create('Factura', function (Blueprint $table) {
            $table->id('fac_id');
            $table->string('fac_afip');
            $table->date('fac_fecha');
            $table->unsignedBigInteger('ven_id')->nullable();

            $table->foreign('ven_id')
                  ->references('ven_id')
                  ->on('Venta')
                  ->onDelete('set null');
            
            $table->unsignedBigInteger('usu_id')->nullable();

            $table->foreign('usu_id')
                  ->references('usu_id')
                  ->on('Usuario')
                  ->onDelete('set null');
            
            $table->unsignedBigInteger('emp_id')->nullable();

            $table->foreign('emp_id')
                  ->references('emp_id')
                  ->on('Empresa')
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
        Schema::dropIfExists('Factura');
    }
};
