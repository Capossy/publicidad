
@extends('adminlte::page')

@section('title', 'Edicion')

@section('content_header')
    <h1>Edicion de Producto</h1>
@stop

@section('content')
<form action={{url('/productos/'.$producto->id)}} method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    @include('producto.form')

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop