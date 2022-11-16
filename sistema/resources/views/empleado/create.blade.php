Formulario de creacion de empleado

<form action="{{ url('/empleado') }}" enctype="multipart/form-data" method="POST">
@csrf 

<!-- Incluir el formulario que esta en empleado y se llama form.-->
@include('empleado.form');


</form>