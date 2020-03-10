<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Tarea;
use App\Categorias;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $categorias = Categoria::all()->pluck('nombre_categoria', 'id');
        return view('tareas.tareaForm', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_tarea' => 'required|max:225',
            'fecha_inicio' => 'required|date',
            'fecha_termino' => 'required|date',
            'descripcion' => 'required|min:5',
            'prioridad' => 'required|min:1|max:10'
            ]);

        $request->merge(['user_id' => \Auth::id()]);
        //dd($request->all());
        Tarea::create($request->all()); //recibe un arreglo del nombre de la columna y el valor de la columna
        /*
        $tarea = new Tarea();
        $tarea->user_id = \Auth::id();
        $tarea->categoria_id = $request->categoria_id;
        $tarea->nombre_tarea = $request->nombre_tarea;
        $tarea->fecha_inicio = $request->fecha_inicio;
        $tarea->fecha_termino = $request->fecha_termino;
        $tarea->descripcion = $request->descripcion;
        $tarea->prioridad = $request->prioridad;
        $tarea->save();
        //dd($tarea);
        //dd($request->descripcion);
        */
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
        $categorias = Categoria::all()->pluck('nombre_categoria', 'id');
        return view('tareas.tareaForm', compact('tarea', 'categorias'));
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
        $request->validate([
            'nombre_tarea' => 'required|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_termino' => 'required|date',
            'descripcion' => 'required',
            'prioridad' => 'required|min:1|max:10'
            ]);

        //$request->merge(['user_id' => \Auth::id()]);
        //dd($request->all());
        Tarea::where('id', $tarea->id)->update($request->except('_token', '_method'));
        /*
        $tarea->categoria_id = $request->categoria_id; ##################################################################
        $tarea->nombre_tarea = $request->nombre_tarea;
        $tarea->fecha_inicio = $request->fecha_inicio;
        $tarea->fecha_termino = $request->fecha_termino;
        $tarea->descripcion = $request->descripcion;
        $tarea->prioridad = $request->prioridad;
        $tarea->save();
        //dd($tarea);
        //dd($request->descripcion);
        */
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
        $tarea->delete();
        return redirect()->route('tarea.index');
    }
}
