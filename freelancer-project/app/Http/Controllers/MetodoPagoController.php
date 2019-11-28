<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MetodoPagoController extends Controller
{
    public function store(Request $request){
      if(!$request->ajax()) return redirect('/');
      $metodoPago = new MetodoPago();
      $metodoPago->nombre_metodo = $request->metodo_pago;
      $metodoPago->monto_min = $request->monto_min;
      $metodoPago->monto_max = $request->monto_max;
      $metodoPago->carga_fija = $request->carga_fija;
      $metodoPago->porcentaje_carga = $request->porcentaje_carga;
      $metodoPago->tarifa = $request->tarifa;
      $metodoPago->dias_procesamiento = $request->dias_procesamiento;
      $metodoPago->status = '1';
      $metodoPago->save();
    }
}
