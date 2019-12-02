<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'city';
    protected $fillable = ['id', 'nombre_ciudad', 'id_state'];
}
