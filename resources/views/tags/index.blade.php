@extends('adminlte::page')

@section('title', 'Etiquetas')

@section('content_header')
    <h1>Etiquetas</h1>
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">


            <a href="{{ route('tags.create') }}" class="btn btn-primary btn-xs pull-right" role="button">

                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> <b>Agregar nueva etiqueta</b>
            </a>


        </div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descripcion</th>


                        <th>
                            Acciones
                        </th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->description }}</td>


                            <td class="border px-4 py-2 btn-group-vertical-justified ">
                                <a href="{{ route('tags.edit', ['tag' => $tag]) }}"
                                    class="btn btn-primary btn-flat"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-flat delete_result"
                                    onclick="event.preventDefault();
                            document.getElementById('delete-tag-{{ $tag->id }}-form').submit();"><i
                                        class="fas fa-trash"></i>
                                </a>
                                <form id="delete-tag-{{ $tag->id }}-form"
                                    action="{{ route('tags.destroy', ['tag' => $tag]) }}" method="POST"
                                    class="hidden">
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
