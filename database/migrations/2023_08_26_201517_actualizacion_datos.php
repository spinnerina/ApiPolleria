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
        Schema::table('Usuario', function (Blueprint $table) {
            $table->string('usu_token', 1000)->nullable()->change();
            $table->boolean('usu_permiso')->default(false);
        });


        Schema::table('Producto', function (Blueprint $table) {
            $table->boolean('prod_estado')->default(true);
        });

        
        Schema::table('Porcentaje', function (Blueprint $table) {
            // Elimina la clave foránea existente
            $table->dropForeign(['prod_id']);

            // Crea la nueva clave foránea con la opción onDelete 'cascade'
            $table->foreign('prod_id')
                  ->references('prod_id')
                  ->on('Producto')
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
        //
    }
};
