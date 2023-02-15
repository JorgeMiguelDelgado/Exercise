@extends('adminlte::page')

@section('title', 'Notas')

@section('content_header')
    <h1>Lista de notas</h1>
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">




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
                            @if ($note->status == 1)
                                <td>
                                    <center><i class="fas fa-check-circle" style="color: green"></i></center>
                                </td>
                            @else
                            <td>
                                <center><i class="fas fa-times-circle" style="color: red"></i></center>
                            </td>
                            @endif


                            @foreach ($category as $cat)
                                @if ($note->category == $cat->id)
                                    <td>{{ $cat->name }} </td>
                                @endif
                            @endforeach


                            <td class="border px-4 py-2 btn-group-vertical-justified ">
                                <a href="{{ route('notes.edit', ['note' => $note]) }}" class="btn btn-primary btn-flat"><i
                                        class="fas fa-edit"></i></a>
                                
                                <a href="" data-target="#modal-update-{{$note->id}}" data-toggle="modal"><button class="btn btn-warning"><i class="fas fa-archive"></i></button></a>
                                @include('notes.modal')
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
