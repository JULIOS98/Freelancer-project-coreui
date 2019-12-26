<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo_proyecto', 250);
            $table->string('empresa_proyecto', 250);
            $table->string('descripcion',250);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            
      
            $table->unsignedInteger('id_participante');
            $table->foreign('id_participante')
                  ->references('id')->on('participantes')
                  ->onDelete('cascade');
          
          
            

          
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('proyectos');
    }
}
