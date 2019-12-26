<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issues extends Model
{
     //Referencia a la tabla que esta asociada al modelo
    protected $table = 'issues_proyectos';
  
    //Referencia a la clave primaria.
    protected $primaryKey='id';
    
    //Arreglo que contienen los datos a modificar dentro del controlador
    protected $fillable = ['nombre_issue' ,'descripcion', 'id_user'];

}
