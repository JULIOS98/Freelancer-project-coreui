<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Milestone;

class MilestonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $milestones = Milestone::orderBy('id', 'desc')->paginate(3);
        }
        else{
            $milestones = Milestone::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(3);
        }
        

        return [
            'pagination' => [
                'total'        => $milestones->total(),
                'current_page' => $milestones->currentPage(),
                'per_page'     => $milestones->perPage(),
                'last_page'    => $milestones->lastPage(),
                'from'         => $milestones->firstItem(),
                'to'           => $milestones->lastItem(),
            ],
            'milestones_proyectos' => $milestones
        ];
    }

    public function selectMilestone(Request $request){
        if (!$request->ajax()) return redirect('/');
        $milestones = Milestone::where('status','=','1')
        ->select('id','title')->orderBy('title', 'asc')->get();
        return ['milestones_proyectos' => $categorias];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $milestone = new Milestone();
        $milestone->title = $request->title;
        $milestone->descripcion = $request->descripcion;
        $milestone->fecha_inicio = $request->fecha_inicio;
        $milestone->fecha_fin = $request->fecha_fin;
        
        $milestone->status = '1';
        $milestone->save();
    }
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $milestone = Milestone::findOrFail($request->id);
        $categoria->title = $request->title;
        $categoria->descripcion = $request->descripcion;
        $categoria->fecha_inicio = $request->fecha_inicio;
        $categoria->fecha_fin = $request->fecha_fin;
        $categoria->status = '1';
        $categoria->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $milestone = Milestone::findOrFail($request->id);
        $milestone->status = '0';
        $milestone->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $milestone = Milestone::findOrFail($request->id);
        $milestone->status = '1';
        $milestone->save();
    }

    
}
