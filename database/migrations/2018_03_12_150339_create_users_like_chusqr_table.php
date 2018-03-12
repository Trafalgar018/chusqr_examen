<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersLikeChusqrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chusqer_user', function (Blueprint $table) {
            // Definimos los campos
            $table->integer('user_id')->unsigned();
            $table->integer('chusqer_id')->unsigned();

            // Definimos la clave principal
            $table->primary(['user_id', 'chusqer_id']);

            // Definimos las claves foráneas
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('chusqer_id')->references('id')->on('chusqers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_like_chusqer');
    }
}
