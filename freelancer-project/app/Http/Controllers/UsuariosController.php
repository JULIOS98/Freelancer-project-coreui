<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Persona;
use App\Rol;
use App\Ciudad;
use App\MetodoPago;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
  
   public function index(Request $request)
    {
        //if (!$request->ajax()) return redirect('/');
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar=='')
        {
            $users = User::join('personas','users.id_persona','=','personas.id_persona')
            ->join('metodos_pago','personas.id_metodoPago','=','metodos_pago.id')
            ->join('city','personas.id_city','=','city.id')
            ->join('roles','users.id_rol','=','roles.id')
            ->select(
            'users.id', 
            'personas.id_persona', 
            'personas.nombre as nombre_persona', 
            'personas.apellido_paterno', 
            'personas.apellido_materno', 
            'personas.email', 
            'personas.telefono', 
            'personas.balance', 
            'personas.fecha_nacimiento', 
            'metodos_pago.id', 
            'metodos_pago.nombre_metodo', 
            'city.id', 
            'city.nombre_ciudad', 
            'users.nombre', 
            'users.password', 
            'users.status', 
            'roles.id', 
            'roles.nombre_rol')->orderBy('users.id', 'desc')->paginate(3);
        }
        else
        {
            $users = User::join('personas','users.id_persona','=','personas.id_persona')
            ->join('metodos_pago','personas.id_metodoPago','=','metodos_pago.id')
            ->join('city','personas.id_city','=','city.id')
            ->join('roles','users.id_rol','=','roles.id')
            ->select(
            'users.id', 
            'personas.id_persona', 
            'personas.nombre as nombre_persona', 
            'personas.apellido_paterno', 
            'personas.apellido_materno', 
            'personas.email', 
            'personas.telefono', 
            'personas.balance', 
            'personas.fecha_nacimiento', 
            'metodos_pago.id', 
            'metodos_pago.nombre_metodo', 
            'city.id', 
            'city.nombre_ciudad', 
            'users.nombre', 
            'users.password', 
            'users.status', 
            'roles.id', 
            'roles.nombre_rol')            
            ->where('users.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('users.id', 'desc')->paginate(3);
        }
        return [
            'pagination' => [
                'total' => $users->total(),
                'current_page' => $users->currentPage(),
                'per_page' => $users->perPage(),
                'last_page' => $users->lastPage(),
                'from' => $users->firstItem(),
                'to' => $users->lastItem(),
            
            ],
            'users' => $users
        ];
    }
  
    
  
    public function store(Request $request)
    {
       if (!$request->ajax()) return redirect('/');
         
        try{
            DB::beginTransaction();
          
            $persona = new Persona();
            $persona->nombre = $request->nombre;
            $persona->apellido_paterno = $request->apellido_paterno;
            $persona->apellido_materno = $request->apellido_materno;
            $persona->email = $request->email;
            $persona->telefono = '3125186';
            $persona->balance = '0.0';
            $persona->fecha_nacimiento = $request->fecha_nacimiento;
            $persona->id_metodoPago = $request->id_metodoPago;
            $persona->id_city = $request->id_city;
            $persona->save();
 
            $user = new User();
            $user->id_persona = $persona->id_persona;
            $user->nombre = $request->nombre;
            $user->password = bcrypt($request->password);
            $user->status = '1';
            $user->id_rol = '2';          
            $user->save();
 
            DB::commit();
 
        } catch (Exception $e){
            DB::rollBack();
        }
 
    }
  
  /*
          
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $users = Usuario::findOrFail($request->id);
        $users->nombre_usuario = $request->nombre_usuario;
        $users->apellido_usuario = $request->apellido_usuario;
        $users->telefono_usuario = $request->telefono_usuario;
        $users->fecha_nacimiento = $request->fecha_nacimiento;
        $users->ciudad_usuario = $request->ciudad_usuario;
        $users->pais_usuario = $request->pais_usuario;
        $users->status = '1';
        $users->save();
    }
    
      */

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $users = User::findOrFail($request->id);
        $users->status = '1';
        $users->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $users = User::findOrFail($request->id);
        $users->status = '0';
        $users->save();
    }
  
}
