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
            $usuarios = Usuario::orderBy('id', 'desc')->paginate(10);
        }
        else
        {
            $usuarios = Usuario::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(10);
        }
        return [
            'pagination' => [
                'total' => $usuarios->total(),
                'current_page' => $usuarios->currentPage(),
                'per_page' => $usuarios->perPage(),
                'last_page' => $usuarios->lastPage(),
                'from' => $usuarios->firstItem(),
                'to' => $usuarios->lastItem(),
            
            ],
            'usuarios' => $usuarios
        ];
    }
  
    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $usuarios = new Usuario();
        $usuarios->nombre_usuario = $request->nombre_usuario;
        $usuarios->apellido_usuario = $request->apellido_usuario;
        $usuarios->telefono_usuario = $request->telefono_usuario;
        $usuarios->fecha_nacimiento = $request->fecha_nacimiento;
        $usuarios->ciudad_usuario = $request->ciudad_usuario;
        $usuarios->pais_usuario = $request->pais_usuario;
        $usuarios->status = '1';
        $usuarios->save();
    }
          
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $usuarios = Usuario::findOrFail($request->id);
        $usuarios->nombre_usuario = $request->nombre_usuario;
        $usuarios->apellido_usuario = $request->apellido_usuario;
        $usuarios->telefono_usuario = $request->telefono_usuario;
        $usuarios->fecha_nacimiento = $request->fecha_nacimiento;
        $usuarios->ciudad_usuario = $request->ciudad_usuario;
        $usuarios->pais_usuario = $request->pais_usuario;
        $usuarios->status = '1';
        $usuarios->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $usuarios = Usuario::findOrFail($request->id);
        $usuarios->status = '1';
        $usuarios->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $usuarios = Usuario::findOrFail($request->id);
        $usuarios->status = '0';
        $usuarios->save();
    }
}
