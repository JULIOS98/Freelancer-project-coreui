<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetodosPagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metodos_pago', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_metodo',50);
            $table->string('monto_min', 256);
            $table->string('monto_max', 256);
            $table->string('carga_fija', 50);
            $table->string('porcentaje_carga', 50);
            $table->string('tarifa', 150);
            $table->string('dias_procesamiento', 50);
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
        Schema::dropIfExists('metodos_pago');
    }
}
