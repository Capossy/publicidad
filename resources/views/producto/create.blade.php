@extends('adminlte::page')

@section('title', 'Creacion')

@section('content_header')
    <h1>Creacion de Producto</h1>
@stop

@section('content')
<form action={{url('/productos')}} method="POST" enctype="multipart/form-data">
    @csrf
    @include('producto.form')

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
 
@stop