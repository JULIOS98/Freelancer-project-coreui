<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

//Modelo Usuario
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //Referencia a la tabla que esta asociada al modelo
    protected $table = 'users';
  
    //Referencia a la clave primaria.
    protected $primaryKey='id';
    
    //Arreglo que contienen los datos a modificar dentro del controlador
    protected $fillable = ['id_persona' ,'nombre', 'password', 'status' , 'id_rol'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rol()
    {
      return $this->belongsTo('App\Rol');
    }
    
   public function persona()
   {
      return $this->belongsTo('App\Persona');
   }
}
