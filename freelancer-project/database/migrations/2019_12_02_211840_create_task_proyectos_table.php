<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo',50);
            $table->string('descripcion',200);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
       
            
            $table->unsignedInteger('id_milestone');
            $table->foreign('id_milestone')
                  ->references('id')->on('milestones_proyectos')
                  ->onDelete('cascade');
          
            $table->unsignedInteger('id_participante');
            $table->foreign('id_participante')
                  ->references('id')->on('participantes')
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
        Schema::dropIfExists('task_proyectos');
    }
}
