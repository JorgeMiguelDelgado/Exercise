@extends('adminlte::page')

@section('title', 'Notas')

@section('content_header')
    <h1>Lista de notas</h1>
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">


            <a href="{{ route('notes.create') }}" class="btn btn-primary btn-xs pull-right" role="button">

                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> <b>Agregar nueva nota</b>
            </a>


        </div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descripcion</th>
                        <th>Estado</th>
                        <th>Categoria</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notes as $note)
                        <tr>
                            <td>{{ $note->title }}</td>
                            <td>{{ $note->body }}</td>
                            <td>{{ $note->status }}</td>

                            @foreach ($category as $cat)
                                @if ($note->category == $cat->id)
                                    <td>{{ $cat->name }} </td>
                                @endif
                            @endforeach


                            <td class="border px-4 py-2 btn-group-vertical-justified ">
                                <a href="{{ route('notes.edit', ['note' => $note]) }}" class="btn btn-primary btn-flat"><i
                                        class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-flat delete_result"
                                    onclick="event.preventDefault();
                        document.getElementById('delete-note-{{ $note->id }}-form').submit();"><i
                                        class="fas fa-trash"></i>
                                </a>
                                <form id="delete-note-{{ $note->id }}-form"
                                    action="{{ route('notes.destroy', ['note' => $note]) }}" method="POST" class="hidden">
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
