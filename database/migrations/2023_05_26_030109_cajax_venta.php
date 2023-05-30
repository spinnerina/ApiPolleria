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
        Schema::create('CajaxVenta', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('caj_id');

            $table->foreign('caj_id')
                  ->references('caj_id')
                  ->on('Caja')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('ven_id');

            $table->foreign('ven_id')
                  ->references('ven_id')
                  ->on('Venta')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CajaxVenta');
    }
};
