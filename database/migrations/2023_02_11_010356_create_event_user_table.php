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
        Schema::create('event_user', function (Blueprint $table) {
            //Creamos la clave primaria de la tabla de eventos relacionada con la tabla de usuarios
            $table->foreignId('event_id')->references('id')->on('events')->onDelete('cascade');
            //Creamos la clave primaria de la tabla de usuarios relacionada con la tabla de eventos
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            //Creamos la clave ajena de la tabla de eventos relacionada con la tabla de usuarios
            $table->unique(['event_id', 'user_id'], 'claves_ajenas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_user');
    }
};
