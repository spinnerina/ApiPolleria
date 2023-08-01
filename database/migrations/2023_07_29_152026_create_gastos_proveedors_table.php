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
        Schema::create('GastosProveedor', function (Blueprint $table) {
            $table->id('gast_id');
            $table->unsignedBigInteger('prov_id')->nullable();

            $table->foreign('prov_id')
                  ->references('prov_id')
                  ->on('Proveedor')
                  ->onDelete('set null');

            $table->date('gast_fecha');
            $table->decimal('gast_total', 10, 2);            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('GastosProveedor');
    }
};
