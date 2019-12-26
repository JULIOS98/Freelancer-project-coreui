<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gastos extends Model
{
     protected $table = 'gastos';
    protected $fillable = ['id', 'facturable', 'gastos','fecha_gatos', 'monto_gastos', 'accion'];
   
}
