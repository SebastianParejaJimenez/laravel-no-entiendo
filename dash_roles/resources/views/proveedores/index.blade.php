@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                            <a class="btn btn-info" href="{{ route('proveedores.create') }}">Nuevo Blog</a>

                            <table class="table table-stripped mt-2">
                                <thead>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Telefono</th>
                                    <th>Direccion</th>
                                </thead>
                                <tbody>
                                @foreach($proveedores as $proveedor)
                                    <tr>
                                        <td>{{$proveedor->id}}</td>
                                        <td>{{$proveedor->nombre}}</td>
                                        <td>{{$proveedor->telefono}}</td>
                                        <td>{{$proveedor->direccion}}</td>

                                        <td>
                                            <!-- Formulario con html collective (Laravel) -->
                                            <form action="{{ route('proveedores.destroy',$proveedor->id) }}" method="POST">
                                                <a href="{{ route('proveedores.edit',$proveedor->id) }}" class="btn btn-info">Editar</a>
                                                @csrf

                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Borrar</button>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $proveedores->links() !!}
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

