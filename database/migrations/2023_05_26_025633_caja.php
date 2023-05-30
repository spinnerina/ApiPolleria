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
        Schema::create('Caja', function (Blueprint $table) {
            $table->id('caj_id');
            $table->date('caj_fecha');
            $table->decimal('caj_monto',9,2);
            $table->unsignedBigInteger('usu_id')->nullable();

            $table->foreign('usu_id')
                  ->references('usu_id')
                  ->on('Usuario')
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
        Schema::dropIfExists('Caja');
    }
};
