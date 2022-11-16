Formulario que tendra datos en comun con create y edit (Incuyendo)

<label for="Nombre">Nombre</label>
    <input type="text" name="Nombre" name="Nombre" value="{{$empleado->Nombre}}"> <br>
    <label for="ApellidoPaterno">Apellido Paterno</label>
    <input type="text" name="ApellidoPaterno" name="ApellidoPaterno" value="{{$empleado->ApellidoPaterno}}"><br>
    <label for="ApellidoMaterno">Apellido MAterno</label>
    <input type="text" name="ApellidoMaterno" name="ApellidoMaterno" value="{{$empleado->ApellidoMaterno}}"><br>
    <label for="Correo">Correo</label>
    <input type="text" name="Correo" name="Correo" value="{{$empleado->Correo}}"><br>
    <label for="Foto">Foto</label>
    <img src="{{asset('storage'.'/'.$empleado->Foto)}}" width="100"alt="">
    {{$empleado->Foto}}

    <input type="file" ame="Foto" name="Foto" value=""><br>
    

    <input type="submit" value="Guardar Datos">