<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trabajo;
use App\Tarea;
class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $tarea = Tarea::get();
       return $tarea;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //crear nueva tarea

        $tarea = new Tarea();
        $tarea->trabajo_id = $request->id;
        $tarea->descripcion = $request->descripcion;
        $tarea->estado = $request->estado;
        $tarea->save();
        return $tarea;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //crear nueva tarea

        $tarea = new Tarea();
        $tarea->trabajo_id = $request->trabajo_id;
        $tarea->descripcion = $request->descripcion;
        $tarea->estado = 0;
        $tarea->save();
        return $tarea;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarea = Tarea::where('trabajo_id',$id)->get();
       return $tarea;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // editar tarea
        $tarea = Tarea::findOrFail($id);
        $tarea->estado = $request->estado;
        $tarea->save();
        echo($tarea);
        return $tarea;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
