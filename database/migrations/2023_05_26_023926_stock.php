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
        Schema::create('Stock', function (Blueprint $table) {
            $table->id('stock_id');
            $table->integer('stock_cantidad');
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
        Schema::dropIfExists('Stock');
    }
};
