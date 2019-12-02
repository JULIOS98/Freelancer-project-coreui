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
            $table->string('nombre_metodo');
            $table->integer('monto_min');
            $table->integer('monto_max');
            $table->integer('carga_fija');
            $table->decimal('porcentaje_carga',11,2);
            $table->integer('tarifa');
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
