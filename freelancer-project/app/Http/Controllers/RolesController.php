<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;

class RolesController extends Controller
{
    public function index(Request $request)
    {
        //if (!$request->ajax()) return redirect('/');
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        if ($buscar=='')
        {
            $roles = Rol::orderBy('id', 'desc')->paginate(10);
        }
        else
        {
            $roles = Rol::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(10);
        }
        return [
            'pagination' => [
                'total' => $roles->total(),
                'current_page' => $roles->currentPage(),
                'per_page' => $roles->perPage(),
                'last_page' => $roles->lastPage(),
                'from' => $roles->firstItem(),
                'to' => $roles->lastItem(),
            
            ],
            'roles' => $roles
        ];
    }
  
     public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $roles = Rol::findOrFail($request->id);
        $roles->nombre_rol = $request->nombre_rol;
        $roles->descripcion = $request->descripcion;
        $roles->status = '1';
        $roles->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $roles = Rol::findOrFail($request->id);
        $roles->status = '1';
        $roles->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $roles = Rol::findOrFail($request->id);
        $roles->status = '0';
        $roles->save();
    }
  
  
}
