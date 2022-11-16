@extends('layouts.app')

@section('content')


    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-warning" href="{{ route('usuarios.create') }}">Nuevo</a>
                            <table class="table table-stripped mt-2">
                                <thead>
                                    <th>ID</th>
                                    <th>NOMBRES</th>
                                    <th>EMAIL</th>
                                    <th>ROL</th>
                                    <th>ACCIONES</th>

                                </thead>
                                <tbody>
                                    @foreach($usuarios as $usuario)
                                    <tr>
                                        <td>{{$usuario->id}}</td>
                                        <td>{{$usuario->name}}</td>
                                        <td>{{$usuario->email}}</td>
                                        <td>
                                        @if(!empty($usuario->getRoleNames()))
                                        @foreach($usuario->getRoleNames() as $rolname)
                                        <h5><span class="badge badge-dark">{{$rolname}}</span></h5>
                                        @endforeach
                                        @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info" href="{{route('usuarios.edit', $usuario->id)}}">Editar</a>
                                            <!-- Formulario con html collective (Laravel) -->
                                            <form action="/delete" method="POST"></form>
                                            {!! Form::open(['method'=>'DELETE', 'route'=>['usuarios.destroy',$usuario->id], 'style'=>'display:inline']) !!} 
                                                {!! Form::submit('Borrar', ['class'=>'btn btn-danger'])!!}
                                            {!! Form::close() !!}

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $usuarios->links() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection

