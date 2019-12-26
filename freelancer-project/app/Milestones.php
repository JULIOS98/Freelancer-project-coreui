<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Milestones extends Model
{
       protected $fillable = ['id', 'title', 'fecha_inicio','fecha_fin', 'status'];

}
