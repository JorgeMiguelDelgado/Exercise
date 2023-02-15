@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado de notas</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Notas</h1>
            <hr>
            <div class="card">
                <div class="card-header">
                    <h3>Filtrar notas</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('notes.filtered') }}" method="GET">
                        
                        <div class="form-group row">
                            <label for="tag" class="col-md-2 col-form-label text-md-right">Etiqueta:</label>
                            <div class="col-md-6">
                                <select name="tags" class="form-control">
                                    <option value="">Seleccionar una etiqueta</option>
                                    @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}" @if (request('tags') == $tag->id) selected @endif>{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-md-2 col-form-label text-md-right">Categoría:</label>
                            <div class="col-md-6">
                                <select name="category_id" class="form-control">
                                    <option value="">Selecciona una categoría</option>
                                    @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}" @if (request('category_id') == $cat->id) selected @endif>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-primary">Filtrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            @if (count($notes) > 0)
            @foreach ($notes as $note)
            <div class="card my-3">
                <div class="card-body">
                    <h4 class="card-title">{{ $note->title }}</h4>
                    <p class="card-text">{{ $note->body }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">{{ $note->created_at->format('d/m/Y H:i') }}</small>
                        <div class="btn-group">
                            <a href="{{ route('notes.show', $note->id) }}" class="btn btn-sm btn-outline-primary">Ver</a>
                            <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-sm btn-outline-secondary">Editar</a>
                            <form action="{{ route('notes.destroy', $note->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p>No se encontraron notas.</p>
            @endif
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