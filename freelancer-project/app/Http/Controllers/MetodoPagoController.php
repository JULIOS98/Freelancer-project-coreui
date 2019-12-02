<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MetodoPago;

class MetodoPagoController extends Controller
{
    public function index(Request $request)
    {
        //if (!$request->ajax()) return redirect('/');
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        if ($buscar=='')
        {
            $metodos_pago = MetodoPago::orderBy('id', 'desc')->paginate(10);
        }
        else
        {
            $metodos_pago = MetodoPago::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(10);
        }
        return [
            'pagination' => [
                'total' => $metodos_pago->total(),
                'current_page' => $metodos_pago->currentPage(),
                'per_page' => $metodos_pago->perPage(),
                'last_page' => $metodos_pago->lastPage(),
                'from' => $metodos_pago->firstItem(),
                'to' => $metodos_pago->lastItem(),
            
            ],
            'metodos' => $metodos_pago
        ];
    }
  
    public function store(Request $request){
      if(!$request->ajax()) return redirect('/');
      $metodos_pago = new MetodoPago();
      $metodos_pago->nombre_metodo = $request->nombre_metodo;
      $metodos_pago->monto_min = $request->monto_min;
      $metodos_pago->monto_max = $request->monto_max;
      $metodos_pago->carga_fija = $request->carga_fija;
      $metodos_pago->porcentaje_carga = $request->porcentaje_carga;
      $metodos_pago->tarifa = $request->tarifa;
      $metodos_pago->dias_procesamiento = $request->dias_procesamiento;
      $metodos_pago->status = '1';
      $metodos_pago->save();
    }
  
  public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $metodos_pago = MetodoPago::findOrFail($request->id);
        $metodos_pago->nombre_metodo = $request->nombre_metodo;
        $metodos_pago->monto_min = $request->monto_min;
        $metodos_pago->monto_max = $request->monto_max;
        $metodos_pago->carga_fija = $request->carga_fija;
        $metodos_pago->porcentaje_carga = $request->porcentaje_carga;
        $metodos_pago->tarifa = $request->tarifa;
        $metodos_pago->dias_procesamiento = $request->dias_procesamiento;
        $metodos_pago->status = '1';
        $metodos_pago->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $metodos_pago = MetodoPago::findOrFail($request->id);
        $metodos_pago->status = '1';
        $metodos_pago->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $metodos_pago = MetodoPago::findOrFail($request->id);
        $metodos_pago->status = '0';
        $metodos_pago->save();
    }
}
