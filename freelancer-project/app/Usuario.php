<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
     protected $table = 'users';
     protected $fillable = ['id', 'id_persona' , 'nombre', 'password', 'status', 'id_rol'];
}
