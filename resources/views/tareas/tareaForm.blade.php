@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Captuda de nueva tarea</div>

                <div class="card-body">
                    <form action="{{action('TareaController@store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nombre_tarea">Tarea</label>
                            <input type="text" class="form-control" id="nombre_tarea" name="nombre_tarea" rows="1"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="fecha_inicio">Fecha Inicio</label>
                            <input type="date" class="form-control" name="fecha_inicio" rows="1"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="fecha_termino">Fecha Fin</label>
                            <input type="date" class="form-control" name="fecha_termino" rows="1"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" name="descripcion" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="prioridad">Prioridad</label>
                            <select name="prioridad" class="form-control" name="prioridad" rows="1">
                                <option value="1">Baja (1)</option>
                                <option value="2">Media (2)</option>
                                <option value="3">Alta (3)</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
