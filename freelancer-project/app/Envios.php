<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Envios extends Model
{
    protected $fillable = [
        
        'idusuario',
        'tipo_pago',
        'num_transaccion',
        'fecha_hora',
        'envio',
        'total',
        'estado'
     ];
     public function usuario()
     {
         return $this->belongsTo('App\User');
     }
   
 
}

