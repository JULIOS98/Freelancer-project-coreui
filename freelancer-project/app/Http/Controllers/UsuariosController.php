<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuariosController extends Controller
{
  
   public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        if ($buscar=='')
        {
            $users= Usuario::orderBy('id', 'desc')->paginate(10);
        }
        else
        {
            $users = Usuario::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(10);
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
        $users = new Usuario();
        $users->nombre_usuario = $request->nombre_usuario;
        $users->apellido_usuario = $request->apellido_usuario;
        $users->telefono_usuario = $request->telefono_usuario;
        $users->fecha_nacimiento = $request->fecha_nacimiento;
        $users->ciudad_usuario = $request->ciudad_usuario;
        $users->pais_usuario = $request->pais_usuario;
        $users->status = '1';
        $users->save();
    }
          
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

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $users = Usuario::findOrFail($request->id);
        $users->status = '1';
        $users->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $users = Usuario::findOrFail($request->id);
        $users->status = '0';
        $users->save();
    }
}
