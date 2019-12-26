<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('id_persona');
            $table->foreign('id_persona')
                  ->references('id_persona')->on('personas')
                  ->onDelete('cascade');
          
            $table->string('nombre',50);
            $table->string('password',250);
            $table->boolean('status')->default(1);
            
            $table->unsignedInteger('id_rol');
            $table->foreign('id_rol')
                  ->references('id')->on('roles')
                  ->onDelete('cascade');
            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
