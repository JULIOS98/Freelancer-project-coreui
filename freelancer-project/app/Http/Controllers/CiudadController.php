<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;

class CiudadController extends Controller
{
    public function selectCiudad(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $city = Ciudad::select('id','nombre_ciudad')->orderBy('nombre_ciudad', 'asc')->get();
        return ['city' => $city];
    }
}
