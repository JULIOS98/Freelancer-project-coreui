<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues_proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_issue',50);
            $table->string('descripcion',200);
          
            $table->unsignedInteger('id_user');
            $table->foreign('id_user')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            
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
        Schema::dropIfExists('issues_proyectos');
    }
}
