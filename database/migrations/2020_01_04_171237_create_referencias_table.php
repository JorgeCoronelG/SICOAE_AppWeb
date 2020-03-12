<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencias', function (Blueprint $table) {
            $table->string('id', 15);
            $table->primary('id');
            $table->date('fecha');
            $table->string('persona', 150);
            $table->integer('estatus');
            $table->string('matricula', 15);
        });

        Schema::table('referencias', function($table){
            $table->foreign('matricula')->references('matricula')->on('estudiantes')->
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
        Schema::dropIfExists('referencias');
    }
}
