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
        Schema::create('Producto', function (Blueprint $table) {
            $table->id('prod_id');
            $table->string('prod_cod');
            $table->string('prod_descri');
            $table->string('prod_cod_barra')->nullable();
            $table->decimal('prod_precio_lista', 10,2);
            $table->string('prod_imagen')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('prov_id')->nullable();

            $table->foreign('prov_id')
                  ->references('prov_id')
                  ->on('Proveedor')
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
        Schema::dropIfExists('Producto');
    }
};
