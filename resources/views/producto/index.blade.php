@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Listado de Productos</h1>
@stop

@section('content')
    <a href="productos/create" class="btn btn-primary mb-3">Crear</a>
<table id="productos" class="table table-dark table-striped shadow-lg mt-4" style="width: 100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope='col'>ID</th>
            <th scope='col'>Codigo</th>
            <th scope='col'>Foto</th>
            <th scope='col'>Descripcion</th>
            <th scope='col'>Cantidad</th>
            <th scope='col'>Precio</th>
            <th scope='col'>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
        <tr>
            <td>{{$producto->id}}</td>
            <td>{{$producto->codigo}}</td>
            <td><img src="{{asset('storage').'/'.$producto->foto}}" width="200" alt=""></td>
            <td>{{$producto->descripcion}}</td>
            <td>{{$producto->cantidad}}</td>
            <td>{{$producto->precio}}</td>
            <td>
                <a href="{{url ('/productos/'.$producto->id.'/edit')}}" class="btn btn-info">Editar</a>
                <form action="{{route ('productos.destroy',$producto)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Borrar</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css"> 
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> 
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script> 
<script>
    $(document).ready(function () {
    $('#productos').DataTable({
        "lengthMenu": [[5,10,25,50,-1],[5,10,25,50,"Todos"]] 
    });
});
</script>
@stop