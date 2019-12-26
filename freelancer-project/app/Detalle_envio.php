<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_envio extends Model
{
    protected $table = 'detalles_envios';
    protected $fillable = [
        'idenvio', 
        'idpago',
        'monto',
        'tarifa'
    ];
    public $timestamps = false;

}
