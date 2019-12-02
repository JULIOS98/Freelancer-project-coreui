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
          
            $table->integer('id_persona')->unsigned();
            $table->foreign('id_persona')->references('id_persona')->on('personas')->onDelete('cascade');
          
            $table->string('nombre')->unique();
            $table->string('password');
            $table->boolean('status')->default(1);
          
            $table->integer('id_rol')->unsigned();
            $table->foreign('id_rol')->references('id')->on('roles')->onDelete('cascade');
            
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
