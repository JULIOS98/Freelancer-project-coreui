<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_estado');
  
        });
      
        DB::table('states')->insert(array('id'=>'1','nombre_estado'=>'Aguascalientes'));
        DB::table('states')->insert(array('id'=>'2','nombre_estado'=>'Baja Califonia'));
        DB::table('states')->insert(array('id'=>'3','nombre_estado'=>'Jalisco'));
        DB::table('states')->insert(array('id'=>'4','nombre_estado'=>'Queretaro'));
        DB::table('states')->insert(array('id'=>'5','nombre_estado'=>'Tamaulipas'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
}
