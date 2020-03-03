@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('tarea.edit', $tarea->id)}}" class="btn btn-success btn-sm">Editar</a><hr>

                    <form action="{{ route('tarea.destroy', $tarea->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Borrar </button>
                    </form>

                    <table class="table">
                        <th>ID</th>
                        <th>Tarea</th>
                        <th>Descripción</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Termino</th>
                        <th>Prioridad</th>
                        <tr>
                            <td>{{$tarea->id}}</td>
                            <td>{{$tarea->nombre_tarea}}</td>
                            <td>{{$tarea->descripcion}}</td>
                            <td>{{$tarea->fecha_inicio}}</td>
                            <td>{{$tarea->fecha_termino}}</td>
                            <td>{{$tarea->prioridad}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
