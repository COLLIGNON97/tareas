<?php

namespace App\Http\Controllers;

use App\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Recuperar todas las tareas de la DB
        $tareas = Tarea::all();

        return view('tareas.tareasIndex', compact('tareas'));
        //with->(['tareas' => $tareas])
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tareas.tareaForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarea = new Tarea();
        $tarea->nombre_tarea = $request->nombre_tarea;
        $tarea->fecha_inicio = $request->fecha_inicio;
        $tarea->fecha_termino = $request->fecha_termino;
        $tarea->descripcion = $request->descripcion;
        $tarea->prioridad = $request->prioridad;
        $tarea->save();
        //dd($tarea);
        //dd($request->descripcion);
        //
        return redirect()->route('tarea.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show(Tarea $tarea)
    {
        return view('tareas.tareaShow', compact('tarea'));//tarea [idex | show];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarea $tarea)
    {
        return view('tareas.tareaForm', compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $tarea)
    {
        $tarea->nombre_tarea = $request->nombre_tarea;
        $tarea->fecha_inicio = $request->fecha_inicio;
        $tarea->fecha_termino = $request->fecha_termino;
        $tarea->descripcion = $request->descripcion;
        $tarea->prioridad = $request->prioridad;
        $tarea->save();
        //dd($tarea);
        //dd($request->descripcion);
        //
        return redirect()->route('tarea.show', $tarea->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarea $tarea)
    {
        //
    }
}
