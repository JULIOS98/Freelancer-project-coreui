<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnvioController extends Controller
{
     public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $envios = Envio::join('personas','envios.idpersona','envios.idbalance','=','personas.id_personas')
            ->join('metodos_pago', 'envios.id_metodoPago', '=', 'metodos_pago.id')
            ->join('users','envios.idusuario','=','users.id')
            ->select('envios.id','envios.tipo_transaccion',
            'envios.num_transaccion','envios.fecha_hora','envios.envio','envios.total',
            'envios.estado','personas.nombre','users.usuario')
            ->orderBy('envios.id', 'desc')->paginate(3);
        }
        else{
             $envios = Envio::join('personas','envios.idpersona','envios.idbalance','=','personas.id_personas')
            ->join('metodos_pago', 'envios.id_metodoPago', '=', 'metodos_pago.id')
            ->join('users','envios.idusuario','=','users.id')
            ->select('envios.id','envios.tipo_transaccion',
            'envios.num_transaccion','envios.fecha_hora','envios.envio','envios.total',
            'envios.estado','personas.nombre','users.usuario')
            ->where('envios.'.$criterio, 'like', '%'. $buscar . '%')->orderBy('envios.id', 'desc')->paginate(3);
        }
        
        return [
            'pagination' => [
                'total'        => $envios->total(),
                'current_page' => $envios->currentPage(),
                'per_page'     => $envios->perPage(),
                'last_page'    => $envios->lastPage(),
                'from'         => $envios->firstItem(),
                'to'           => $envios->lastItem(),
            ],
            'envios' => $envios
        ];
    }
    public function obtenerCabecera(Request $request){
        if (!$request->ajax()) return redirect('/');

        $id = $request->id;
        $envio = Envio::join('personas','envios.idpersona','envios.idbalance','=','personas.id_personas')
        ->join('metodos_pago', 'envios.id_metodoPago', '=', 'metodos_pago.id')
        ->join('users','envios.idusuario','=','users.id')  
        ->select('envios.id','envios.tipo_transaccion',
        'envios.num_transaccion','envios.fecha_hora','envios.envio','envios.total',
        'envios.estado','personas.nombre','users.usuario')
        ->where('envios.id','=',$id)
        ->orderBy('envios.id', 'desc')->take(1)->get();
        
        return ['envio' => $envio];
    }
    public function obtenerDetalles(Request $request){
        if (!$request->ajax()) return redirect('/');

        $id = $request->id;
        $detalles = DetalleEnvio::join('metodos_pago','detalles.id','=','metodos_pago.id')
        ->select('detalles_envios.monto')
        ->where('detalles_envios.idenvio','=',$id)
        ->orderBy('detalles_envios.id', 'desc')->get();
        
        return ['detalles' => $detalles];
    }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        try{
            DB::beginTransaction();

            $mytime= Carbon::now('America/Lima');

            $envio = new Envio();
          
            $envio->idpersona = $request->idpersona;
            $envio->idusuario = \Auth::user()->id;
            $envio->idbalance=$request->idbalance();
            $envio->tipo_transaccion = $request->tipo_transaccion;
            $envio->num_transaccion = $request->num_transaccion;
            $envio->fecha_hora = $mytime->toDateString();
            $envio->total = $request->total;
            $envio->estado = 'Registrado';
            $envio->save();

            $detalles = $request->data;//Array de detalles
            //Recorro todos los elementos

            foreach($detalles as $ep=>$det)
            {
                $detalle = new DetalleEnvio();
                $detalle->idenvio = $envio->id;
                $detalle->nombre_metodo =$det['nombre_metodo'];
                $detalle->balance = $det['balance'];
                $detalle->monto = $det['monto'];
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
        $envio = Envio::findOrFail($request->id);
        $envio->estado = 'Anulado';
        $envio->save();
    }
}
