<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->string('matricula', 15);
            $table->primary('matricula');
            $table->string('tarjeta', 20);
            $table->string('nombre', 150);
            $table->date('fecha_nacimiento', 20);
            $table->string('curp',18);
            $table->integer('estatus');
            $table->integer('grado')->unsigned()->nullable();
            $table->string('grupo', 50)->nullable();
        });

        Schema::table('estudiantes', function($table){
            $table->foreign('grado')->references('grado')->on('grados')->
                onDelete('set null')->onUpdate('cascade');
            $table->foreign('grupo')->references('grupo')->on('grupos')->
                onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
}
