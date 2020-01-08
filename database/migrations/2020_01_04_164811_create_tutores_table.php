<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutores', function (Blueprint $table) {
            $table->string('id', 100);
            $table->primary('id');
            $table->string('nombre', 150);
            $table->string('telefono', 10);
            $table->string('correo', 120);
            $table->foreign('correo')->references('correo')->on('usuarios')->
                onDelete('cascade')->
                onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tutores');
    }
}
