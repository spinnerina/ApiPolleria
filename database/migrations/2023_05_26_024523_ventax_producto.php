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
        Schema::create('VentaxProducto', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('cantidad');
            $table->unsignedBigInteger('ven_id');

            $table->foreign('ven_id')
                  ->references('ven_id')
                  ->on('Venta')
                  ->onDelete('cascade');
            
            $table->unsignedBigInteger('prod_id')->nullable();
            
            $table->foreign('prod_id')
                  ->references('prod_id')
                  ->on('Producto')
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
        Schema::dropIfExists('VentaxProducto');
    }
};
