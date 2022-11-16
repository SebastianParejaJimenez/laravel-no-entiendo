@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Todos los Articulos</h1>
@stop

@section('content')
<div class="card text-center">
  <div class="card-header">
    Crear Articulos
  </div>
  <div class="card-body">
    <p class="card-text">Precione el siguiente boton para dirigirse al formulario y Crear un Articulo.</p>
    <a href="articulos/create" class="btn btn-success"><i class="fas fa-fw fa-share"></i>
Dirigirse al Formulario</a>
  </div>
</div>
<a href="" class=" btn btn-primary mb-2">Crear</a>
<table id="articulos" class="table table-striped mt-4">
    <thead class="text-white bg-primary">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Codigo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Tiempo de Creacion</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($articulos as $articulo)
        <tr>
            <td>{{$articulo->id}}</td>
            <td>{{$articulo->codigo}}</td>
            <td>{{$articulo->descripcion}}</td>
            <td>{{$articulo->cantidad}}</td>
            <td>{{$articulo->precio}}</td>
            <td>{{$articulo->created_at}}</td>
            <td>
                <form action=" {{route('articulos.destroy',$articulo->id)}}" method="POST">
                <a href="/articulos/{{$articulo->id}}/edit" class="btn btn-info">Editar</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning">Eliminar</button>
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
    $('#articulos').DataTable({
        "lengthMenu":[[5,10,-1],[5,10,"All"]]
                            });
});
</script>
@stop

@yield('tablas')