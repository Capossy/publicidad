@extends('adminlte::page')

@section('title', 'Prueba')

@section('content_header')
    <h1>Creacion</h1>
@stop

@section('content')
<form action="{{ url('/file')}}" method="post" enctype="multipart/form-data"> 
    @csrf
    @include('file.form',['modo'=>'Crear'])
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

