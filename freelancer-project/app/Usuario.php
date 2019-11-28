<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
     protected $fillable = ['id', 'nombre_usuario' , 'apellido_usuario', 'telefono_usuario', 'fecha_nacimiento', 'ciudad_usuario', 'pais_usuario', 'status'];
}
