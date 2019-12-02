<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    protected $table = 'metodos_pago';
    protected $fillable = ['id', 'nombre_metodo', 'monto_min', 'monto_max', 'carga_fija', 'porcentaje_carga', 'tarifa', 'dias_procesamiento', 'status'];

    public function personas()
    {
      return $this->hasMany('App\Persona');
    }
}
