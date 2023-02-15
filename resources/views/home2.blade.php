@extends('adminlte::page')

@section('title', 'Ensolver Exercise')

@section('content_header')
    <h1>Inicio</h1>
@stop

@section('content')
<div class="container">
    <h1>Notas</h1>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Contenido</th>
                        <th>Fecha de creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notas as $nota)
                        <tr>
                            <td>{{$count++}}</td>
                            <td><i class="fas fa-sticky-note" style="color: green"></i> {{ $nota->title }}</td>
                            <td>{{ $nota->body }}</td>
                            <td>{{ $nota->created_at->format('d/m/Y H:i:s') }}</td>
                            <td>
                                <a href="{{ route('notes.edit', $nota->id) }}" class="btn btn-primary">Editar</a>
                                <form action="{{ route('notes.destroy', $nota->id) }}" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop