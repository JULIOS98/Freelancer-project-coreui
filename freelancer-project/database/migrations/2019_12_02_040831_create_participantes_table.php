<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participantes', function (Blueprint $table) {
            $table->increments('id');
        
            $table->unsignedInteger('id_user');
            $table->foreign('id_user')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
          
            $table->unsignedInteger('id_issue');
            $table->foreign('id_issue')
                  ->references('id')->on('issues_proyectos')
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
        Schema::dropIfExists('participantes');
    }
}
