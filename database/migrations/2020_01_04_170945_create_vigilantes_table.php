<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVigilantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vigilantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 150);
            $table->string('telefono', 10);
            $table->string('correo', 120);
        });

        Schema::table('vigilantes', function($table){
            $table->foreign('correo')->references('correo')->on('usuarios')->
                onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vigilantes');
    }
}
