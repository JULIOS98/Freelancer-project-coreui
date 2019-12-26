<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RetiroController extends Controller
{
     public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $retiros = Retiro::join('personas','retiros.idpersona','retiros.idbalance','=','personas.id_personas')
            ->join('metodos_pago', 'retiros.id_metodoPago', '=', 'metodos_pago.id')
            ->join('users','retiros.idusuario','=','users.id')
            ->select('retiros.id','retiros.tipo_transaccion',
            'retiros.num_transaccion','retiros.fecha_hora','retiros.retiro','retiros.total',
            'retiros.estado','personas.nombre','users.usuario')
            ->orderBy('retiros.id', 'desc')->paginate(3);
        }
        else{
             $retiros = Retiro::join('personas','retiros.idpersona','retiros.idbalance','=','personas.id_personas')
            ->join('metodos_pago', 'retiros.id_metodoPago', '=', 'metodos_pago.id')
            ->join('users','retiros.idusuario','=','users.id')
            ->select('retiros.id','retiros.tipo_transaccion',
            'retiros.num_transaccion','retiros.fecha_hora','retiros.retiro','retiros.total',
            'retiros.estado','personas.nombre','users.usuario')
            ->where('retiros.'.$criterio, 'like', '%'. $buscar . '%')->orderBy('retiros.id', 'desc')->paginate(3);
        }
        
        return [
            'pagination' => [
                'total'        => $retiros->total(),
                'current_page' => $retiros->currentPage(),
                'per_page'     => $retiros->perPage(),
                'last_page'    => $retiros->lastPage(),
                'from'         => $retiros->firstItem(),
                'to'           => $retiros->lastItem(),
            ],
            'retiros' => $retiros       ];
    }
    public function obtenerCabecera(Request $request){
        if (!$request->ajax()) return redirect('/');

        $id = $request->id;
        $retiros = Retiro::join('personas','retiros.idpersona','retiros.idbalance','=','personas.id_personas')
        ->join('metodos_pago', 'retiros.id_metodoPago', '=', 'metodos_pago.id')
        ->join('users','retiros.idusuario','=','users.id')  
        ->select('retiros.id','retiros.tipo_transaccion',
        'retiros.num_pago','retiros.fecha_hora','retiros.retiro','retiros.total',
        'retiros.estado','personas.nombre','users.usuario')
        ->where('retiros.id','=',$id)
        ->orderBy('retiros.id', 'desc')->take(1)->get();
        
        return ['retiro' => $retiro];
    }
    public function obtenerDetalles(Request $request){
        if (!$request->ajax()) return redirect('/');

        $id = $request->id;
        $detalles = DetalleRetiro::join('metodos_pago','detalles.id','=','metodos_pago.id')
        ->select('detalles_retiros.monto')
        ->where('detalles_retiros.idretiro','=',$id)
        ->orderBy('detalles_retiros.id', 'desc')->get();
        
        return ['detalles' => $detalles];
    }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        try{
            DB::beginTransaction();

            $mytime= Carbon::now('America/Lima');

            $retiro = new Retiro();
          
            $retiro->idpersona = $request->idpersona;
            $retiro->idusuario = \Auth::user()->id;
            $retiro->idbalance=$request->idbalance();
            $retiro->tipo_transaccion = $request->tipo_transaccion;
            $retiro->num_transaccion = $request->num_transaccion;
            $retiro->fecha_hora = $mytime->toDateString();
            $retiro->total = $request->total;
            $retiro->estado = 'Registrado';
            $retiro->save();

            $detalles  = $request->data;//Array de detalles
            //Recorro todos los elementos

            foreach($detalles as $ep=>$det)
            {
                $detalle = new DetalleRetiro();
                $detalle->idretiro = $retiro->id;
                $detalle->nombre_metodo =$det['nombre_metodo'];
                $detalle->balance = $det['balance'];
                $detalle->monto = $det['cobro'];
                $detalle->tarifa = $det['tarifa'];          
                $detalle->save();
            }          

            DB::commit();
        } catch (Exception $e){
            DB::rollBack();
        }
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $retiro = Retiro::findOrFail($request->id);
        $retiro->estado = 'Anulado';
        $retiro->save();
    }
}
