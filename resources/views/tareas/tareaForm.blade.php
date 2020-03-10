@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Captuda de nueva tarea</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @isset($tarea)
                        {!! Form::model($tarea, ['route' => ['tarea.update', $tarea->id], 'method' => 'PATCH']) !!}
                        {{-- <form action="{{action('TareaController@update', $tarea->id)}}" method="POST"> --}}
                        @method('PATCH')
                    @else
                        {!! Form::open(['route' => 'tarea.store']) !!}
                        {{-- <form action="{{action('TareaController@store')}}" method="POST"> --}}
                    @endisset
                        @csrf
                        <div class="form-group">
                            {!! Form::label('nombre_tarea', 'Tarea') !!}
                            <!-- <label for="nombre_tarea">Tarea</label> -->
                            {!! Form::text('nombre_tarea', null, ['class' => 'form-control']) !!}
                        {{-- <input type="text" class="form-control" id="nombre_tarea" name="nombre_tarea" rows="1" value="{{$tarea->nombre_tarea ?? ''}}"></textarea>--}}
                        </div>
                        <div class="form-group">
                            {!! Form::label('fecha_inicio', 'Fecha Inicio') !!}
                            {{-- <label for="fecha_inicio">Fecha Inicio</label> --}}
                            {!! Form::date('fecha_inicio', isset($tarea) ? $tarea->fecha_inicio->todateString() : null, ['class' => 'form-control']) !!}
                            {{-- <input type="date" class="form-control" name="fecha_inicio" rows="1" value="{{$tarea->fecha_inicio ?? ''}}"></textarea> --}}
                        </div>
                        <div class="form-group">
                            {!! Form::label('fecha_termino', 'Fecha Termino') !!}
                            {{-- <label for="fecha_termino">Fecha Fin</label> --}}
                            {!! Form::date('fecha_termino', isset($tarea) ? $tarea->fecha_termino->todateString() :null, ['class' => 'form-control']) !!}
                            {{-- <input type="date" class="form-control" name="fecha_termino" rows="1" value="{{$tarea->fecha_termino ?? ''}}"></textarea> --}}
                        </div>
                        <div class="form-group">
                            {!! Form::label('descripcion', 'Descripción') !!}
                            {{-- <label for="descripcion">Descripción</label> --}}
                            {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
                            {{-- <textarea class="form-control" name="descripcion" rows="3">{{$tarea->descripcion ?? ''}}</textarea> --}}
                        </div>
                        <div class="form-group">
                            {!! Form::label('prioridad', 'Prioridad') !!}
                            {{-- <label for="prioridad">Prioridad</label> --}}
                            {!! Form::select('prioridad', ['1' => 'Baja','2' => 'Media', '3' => 'Alta'], null, ['class' => 'form-control']) !!}
                            {{-- <select name="prioridad" class="form-control" name="prioridad" rows="1">
                                <option value="1" {{ isset($tarea) && $tarea->prioridad == 1 ? 'selected' : ''}}>Baja (1)</option>
                                <option value="2" {{ isset($tarea) && $tarea->prioridad == 1 ? 'selected' : ''}}>Media (2)</option>
                                <option value="3" {{ isset($tarea) && $tarea->prioridad == 1 ? 'selected' : ''}}>Alta (3)</option>
                            </select> --}}
                        </div>
                        <div class="form-group">
                            {!! Form::label('categoria', 'Categorías') !!}
                            {{-- <label for="prioridad">Prioridad</label> --}}
                            {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control']) !!}
                            {{-- <select name="prioridad" class="form-control" name="prioridad" rows="1">
                                <option value="1" {{ isset($tarea) && $tarea->prioridad == 1 ? 'selected' : ''}}>Baja (1)</option>
                                <option value="2" {{ isset($tarea) && $tarea->prioridad == 1 ? 'selected' : ''}}>Media (2)</option>
                                <option value="3" {{ isset($tarea) && $tarea->prioridad == 1 ? 'selected' : ''}}>Alta (3)</option>
                            </select> --}}
                        </div>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
