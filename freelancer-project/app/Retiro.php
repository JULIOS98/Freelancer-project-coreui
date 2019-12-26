<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retiro extends Model
{
    protected $fillable =[
         
        'idusuario',
        'tipo_pago',
        'num_transaccion',
        'fecha_hora',
        'envío',
        'total',
        'estado'
    ];
}
