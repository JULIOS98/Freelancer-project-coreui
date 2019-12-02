<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_rol',50)->unique();
            $table->string('descripcion',100);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
      
      
        DB::table('roles')->insert(array('id'=>'1','nombre_rol'=>'Administrador', 'descripcion'=>'Administrador del sistema'));
        DB::table('roles')->insert(array('id'=>'2','nombre_rol'=>'Jefe de Proyecto','descripcion'=>'Jefe encargado del proyecto'));
        DB::table('roles')->insert(array('id'=>'3','nombre_rol'=>'Desarrollador','descripcion'=>'Empleados acargo del jefe del proyecto'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
