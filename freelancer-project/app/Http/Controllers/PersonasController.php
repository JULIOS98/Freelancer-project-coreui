<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Persona;
use App\MetodoPago;
use App\Ciudad;

class PersonasController extends Controller
{
    
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $buscar = $request->buscar;
        $criterio = $request->criterio;
         
        if ($buscar==''){
            $personas = Persona::join('metodos_pago','personas.id_metodoPago','=','metodos_pago.id')
            ->join('city','personas.id_ciudad','=','city.id')
            ->select('personas.id_persona','personas.nombre','personas.apellido_paterno',
            'personas.apellido_materno','personas.email','personas.telefono',
            'personas.balance','personas.fecha_nacimiento','metodos_pago.nombre_metodo',
            'city.nombre_ciudad')
            ->orderBy('personas.id_persona', 'desc')->paginate(3);
        }
        else{
            $personas = Persona::join('metodos_pago','personas.id_metodoPago','=','metodos_pago.id')
            ->join('city','personas.id_ciudad','=','city.id')
            ->select('personas.id_persona','personas.nombre','personas.apellido_paterno',
            'personas.apellido_materno','personas.email','personas.telefono',
            'personas.balance','personas.fecha_nacimiento','metodos_pago.nombre_metodo',
            'city.nombre_ciudad')            
            ->where('personas.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('personas.id_persona', 'desc')->paginate(3);
        }
         
 
        return [
            'pagination' => [
                'total'        => $personas->total(),
                'current_page' => $personas->currentPage(),
                'per_page'     => $personas->perPage(),
                'last_page'    => $personas->lastPage(),
                'from'         => $personas->firstItem(),
                'to'           => $personas->lastItem(),
            ],
            'personas' => $personas
        ];
    }
}
 