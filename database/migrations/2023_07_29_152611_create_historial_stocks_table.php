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
        Schema::create('HistorialStock', function (Blueprint $table) {
            $table->id('his_id');
            $table->unsignedBigInteger('stock_id')->nullable();

            $table->foreign('stock_id')
                  ->references('stock_id')
                  ->on('Stock')
                  ->onDelete('set null');
            $table->date('his_fecha');
            $table->integer('his_cantidad_ingresada');
            $table->decimal('his_precio', 10, 2);
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('HistorialStock');
    }
};
