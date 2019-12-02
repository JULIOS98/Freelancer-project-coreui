<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';
    protected $fillable = ['id_persona', 'nombre', 'apellido_paterno', 'apellido_materno', 'email', 'telefono', 'balance', 'fecha_nacimiento', 'id_metodoPago','id_ciudad'];

   public function user()
   {
      return $this->hasOne('App\User');
   }
  
   public function metodo()
   {
      return $this->belongsTo('App\MetodoPago');
   }
    
   public function ciudad()
   {
      return $this->belongsTo('App\Ciudad');
   }
  
  
  
  
  
  
  
  
}
