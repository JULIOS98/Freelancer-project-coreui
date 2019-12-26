<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_retiro extends Model
{
    protected $table = 'detalles_retiro';
    protected $fillable = [
        'idventa', 
        'idpago',
        'cobro',
        'tarifa'
    ];  
    public $timestamps = false;
}
