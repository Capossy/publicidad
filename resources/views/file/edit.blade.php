
@extends('adminlte::page')

@section('title', 'Prueba')

@section('content_header')
    <h1>Edicion</h1>
@stop

@section('content')
    
<form action="{{url ('/file/'.$file->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    @include('file.form',['modo'=>'Editar']);
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
