<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        //Esta es la variable que nos va a permitir consultar datos en el index
        //Paginate, Consultar informacion entre un rango
        $datos['empleados']=Empleado::paginate(5);
        //Ponemos la variable datos a index para poder verlos
        return view('empleado.index',$datos); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosempleado = request()->except('_token');


        //Restrincion de si hay fotografia para alterar ese campo y usar el nombre y insertalo, sino quedaria en bd un archivo tmp
        if ($request->hasFile('Foto')) {
            $datosempleado['Foto']=$request->File('Foto')->store('uploads','public');
        }

        Empleado::insert($datosempleado);
        //Llamamos al modelo y le decimos que los datos de empleado los inserte directamente
        return response()->json($datosempleado);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //Traer o recuperar los datos

        $empleado = Empleado::findOrFail($id);
        //Añadir los datos encontrados por id al retornar
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosempleado = request()->except('_token','_method');

        //Validacion para la foto si existe y hacemos un borrado de la foto (Incluimos una clase al codigo "use Illuminate\Support\Facades\Storage;")

        if ($request->hasFile('Foto')) {
            $empleado = Empleado::findOrFail($id); //Recuperamos informacion
            Storage::delete('public/'.$empleado->Foto); //Eliminar la foto anterior

            $datosempleado['Foto']=$request->File('Foto')->store('uploads','public');//Actualizar la informacion nueva
        }



        //Decirle que busque el id y al encontrarlo hacer un update.
        Empleado::where('id','=',$id)->update($datosempleado);

                //Traer o recuperar los datos
                $empleado = Empleado::findOrFail($id);
                //Añadir los datos encontrados por id al retornar
                return view('empleado.edit', compact('empleado'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //Vamos a recibir un id y con ese id vamos a eliminar
        Empleado::destroy($id);
        //Redireccion hacia empleado o index de la tabla
        return redirect('empleado');
    }
}
