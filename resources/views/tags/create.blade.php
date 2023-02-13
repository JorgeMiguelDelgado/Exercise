@extends('adminlte::page')

@section('title', 'Registrar etiqueta')


@section('content_header')
@stop

@section('content')
<div class="flex justity-center flex-wrap p-4 mt-5">
    @include('tags.form')
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop