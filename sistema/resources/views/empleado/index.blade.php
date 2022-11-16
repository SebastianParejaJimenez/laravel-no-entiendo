Mostrar Lista de Empleados

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Correo</th>
            <th>Botones</th>

        </tr>
    </thead>
    <tbody>
    @foreach($empleados as $empleado)
        <tr>
            <td>{{$empleado->id}}</td>


            <td>
                <!-- Ingresar a la ruta de storage y buscar la foto segun lo guardado y asi mostrarla, 
                Crear una referencia para que funciona hay que hacer el comando php artisan storage:link -->
            <img src="{{asset('storage'.'/'.$empleado->Foto)}}" alt="">
        
            <!-- {{$empleado->Foto}} -->
        </td>



            <td>{{$empleado->Nombre}}</td>
            <td>{{$empleado->ApellidoPaterno}}</td>
            <td>{{$empleado->ApellidoMaterno}}</td>
            <td>{{$empleado->Correo}}</td>
            <td>
                <!--Maneras de usar los botones -->
                <a href="{{url('/empleado/'.$empleado->id.'/edit')}}">
            Editar
                </a>
                <form action="{{url('/empleado/'.$empleado->id)}}" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                    <input type="submit" value="borrar" onclick="return confirm('¿Deseas Borrar?')">
                </form>
            </td>
        </tr>
    </tbody>
    @endforeach


</table>