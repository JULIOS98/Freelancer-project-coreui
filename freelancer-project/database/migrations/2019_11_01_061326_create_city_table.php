<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_ciudad');
          
            $table->unsignedInteger('id_state');
            $table->foreign('id_state')
                  ->references('id')->on('states')
                  ->onDelete('cascade');
    
          
        });
      
        DB::table('city')->insert(array('nombre_ciudad'=>'Aguascalientes','id_state'=> 1));
        DB::table('city')->insert(array('nombre_ciudad'=>'Calvillo', 'id_state' => 1));
        DB::table('city')->insert(array('nombre_ciudad'=>'San Jose', 'id_state' => 1));
      
      
        DB::table('city')->insert(array('nombre_ciudad'=>'Tijuana','id_state'=> 2));
        DB::table('city')->insert(array('nombre_ciudad'=>'Mexicali', 'id_state' => 2));
        DB::table('city')->insert(array('nombre_ciudad'=>'Tecate', 'id_state' => 2));
      
      
        DB::table('city')->insert(array('nombre_ciudad'=>'Guadalajara','id_state'=> 3));
        DB::table('city')->insert(array('nombre_ciudad'=>'Ciudad Guzman', 'id_state' => 3));
        DB::table('city')->insert(array('nombre_ciudad'=>'Tequila', 'id_state' => 3));
      
      
        DB::table('city')->insert(array('nombre_ciudad'=>'Queretaro','id_state'=> 4));
        DB::table('city')->insert(array('nombre_ciudad'=>'Quereta York', 'id_state' => 4));
        DB::table('city')->insert(array('nombre_ciudad'=>'Chapopan', 'id_state' => 4));
      
      
        DB::table('city')->insert(array('nombre_ciudad'=>'Ciudad Victoria','id_state'=> 5));
        DB::table('city')->insert(array('nombre_ciudad'=>'Tampico', 'id_state' => 5));
        DB::table('city')->insert(array('nombre_ciudad'=>'Reynosa', 'id_state' => 5));
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city');
    }
}
