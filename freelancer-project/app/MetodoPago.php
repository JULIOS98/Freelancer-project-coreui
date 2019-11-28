<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    protected $fillable = ['id', 'nombre_metodo', 'monto_min', 'monto_max', 'carga_fija', 'porcentaje_carga', 'tarifa', 'dias_procesamiento', 'status'];
}