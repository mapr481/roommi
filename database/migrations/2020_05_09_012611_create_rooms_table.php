<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('slug')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('direccion');
            $table->string('imagen');
            $table->string('precio');
            $table->text('detalles', 2000);
            $table->foreignId('room_type_id');
            $table->foreignId('gender_id');
            $table->timestamps();
        });

      Schema::table('rooms', function($table){
            $table->foreign('room_type_id')->references('id')->on('room_types');
            $table->foreign('gender_id')->references('id')->on('genders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
