
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Formulario para Articulos</h1>

@stop

@section('content')
<form action="/articulos" method="POST" class="m-4 p-3 border">
   @csrf 

  <div class="mb-3">
    <label for="" class="form-label">Codigo</label>
    <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Ingrese el Codigo del Articulo">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Descripcion</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese una Descripcion para el Articulo">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Cantidad</label>
    <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Ingrese la Cantidad del Articulos">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Precio</label>
    <input type="number" class="form-control" id="precio" name="precio" placeholder="Ingrese el Precio del Articulo">
  </div>

  <button type="submit" class="btn btn-success">Guardar</button>
  <a href="/articulos" class="btn btn-secondary">Cancelar</a>

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop