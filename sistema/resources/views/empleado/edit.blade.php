formulario de edicion de empleado


<form action="{{url('/empleado/'.$empleado->id)}}" method="post" enctype="multipart/form-data">
@csrf

<!--Metodo que nos pide el route list -->
{{method_field('PATCH')}}

@include('empleado.form');



</form>
