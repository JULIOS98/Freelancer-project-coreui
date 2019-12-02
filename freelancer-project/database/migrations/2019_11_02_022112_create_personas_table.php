<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id_persona');
            $table->string('nombre',50);
            $table->string('apellido_paterno',50);
            $table->string('apellido_materno',50);
            $table->string('email',100)->unique();
            $table->string('telefono',50);
            $table->decimal('balance',11,2);
            $table->date('fecha_nacimiento');
          
         
          
            $table->unsignedInteger('id_metodoPago');
            $table->foreign('id_metodoPago')
                  ->references('id')->on('metodos_pago')
                  ->onDelete('cascade');
          
            $table->unsignedInteger('id_city');
            $table->foreign('id_city')
                  ->references('id')->on('city')
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
        Schema::dropIfExists('personas');
    }
}
