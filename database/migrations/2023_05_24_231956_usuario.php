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
        Schema::create('Usuario', function (Blueprint $table) {
            $table->id('usu_id');
            $table->string('usu_login');
            $table->string('usu_contrasenia');
            $table->string('usu_nombre');
            $table->string('usu_img')->nullable();
            $table->boolean('usu_estado')->default(true);
            $table->string('usu_mail');
            $table->string('usu_token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Usuario');
    }
};
