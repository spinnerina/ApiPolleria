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
        Schema::create('Venta', function (Blueprint $table) {
            $table->id('ven_id');
            $table->unsignedBigInteger('cli_id')->nullable();

            $table->foreign('cli_id')
                  ->references('cli_id')
                  ->on('Cliente')
                  ->onDelete('set null');

            $table->decimal('ven_total',9,2);
            $table->date('ven_fecha');
            $table->integer('ven_cuotas')->default(1);
            $table->unsignedBigInteger('form_pago_id')->nullable();

            $table->foreign('form_pago_id')
                  ->references('form_pago_id')
                  ->on('FormaPago')
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
        Schema::dropIfExists('Venta');
    }
};
