<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('Porcentaje', function (Blueprint $table) {
            $table->id('por_id');
            $table->decimal('por_porcentaje');
            $table->unsignedBigInteger('prod_id')->nullable();

            $table->foreign('prod_id')
                  ->references('prod_id')
                  ->on('Producto')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('Porcentaje');
    }
};
