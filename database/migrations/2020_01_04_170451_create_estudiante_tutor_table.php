<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudianteTutorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante_tutor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matricula', 15);
            $table->string('tutor', 100);
            $table->foreign('matricula')->references('matricula')->on('estudiantes')->
                onDelete('cascade')->
                onUpdate('cascade');
            $table->foreign('tutor')->references('id')->on('tutores')->
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
        Schema::dropIfExists('estudiante_tutor');
    }
}
