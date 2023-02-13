@extends('adminlte::page')

@section('title', 'Categoria')

@section('content_header')
    <h1>Categoria de notas</h1>
@stop

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        
        
        <a href="{{ route('categories.create') }}" class="btn btn-primary btn-xs pull-right" role="button">
            
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> <b>Agregar nueva categoria</b>
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
                @foreach ($categories as $cat)
                    <tr>
                        <td>{{ $cat->name }}</td>
                        <td>{{ $cat->description }}</td>
                        
                        
                        <td class="border px-4 py-2 btn-group-vertical-justified ">
                            <a href="{{ route('categories.edit', ['category' => $cat]) }}"
                                class="btn btn-primary btn-flat"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger btn-flat delete_result"
                                onclick="event.preventDefault();
                            document.getElementById('delete-cat-{{ $cat->id }}-form').submit();"><i class="fas fa-trash"></i>
                            </a>
                            <form id="delete-cat-{{ $cat->id }}-form"
                                action="{{ route('categories.destroy', ['category' => $cat]) }}" method="POST"
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
    <script> console.log('Hi!'); </script>
@stop