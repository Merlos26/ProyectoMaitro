<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['personas']= Persona::paginate(5);
        return view("Persona.index", $datos); 

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("Persona.create"); //accede a la vista create

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $campos = [
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'Telefono'=>'required|string|max:100',
            'Correo'=>'required|email',
            'Direccion'=>'required|string|max:300',
            'Foto'=>'required|max:10000|mimes:jpeg,png,jpg'
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'La foto es requerida'
        ];

        $this->validate($request,$campos,$mensaje);

        //$datosEmpleado = request()->all();
        $datosPersona = request()->except('_token');

        if ($request->hasFile('Foto')) {
            $datosPersona['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Persona::insert($datosPersona);
        //return response()->json($datosPersona);
        return redirect('Persona')->with('mensaje','Persona agregada con Exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $persona=Persona::findOrfail($id);
        return view("Persona.edit", compact('persona')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'Telefono'=>'required|string|max:100',
            'Correo'=>'required|email',
            'Direccion'=>'required|string|max:300'
            
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
           
        ];

        if ($request->hasFile('Foto')) {//aqui se valida la Foto por si quiere subir una nueva
            $campos=['Foto'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje = ['Foto.required'=>'La Foto es requerida' ]; 
        }

        $this->validate($request,$campos,$mensaje);

        $DatosPersona = request()->except(['_token','_method']);
        if ($request->hasFile('Foto')) {
            $persona=Persona::findOrfail($id);
            Storage::delete('public/'.$persona->Foto);
            $DatosPersona['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Persona::where('id','=',$id)->update($DatosPersona);
        $persona=Persona::findOrfail($id);
        //return view("Persona.edit", compact('Persona'));
        return redirect('Persona')->with('mensaje','Persona modificada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $Pers=Persona::findOrfail($id);
        if(Storage::delete('public/'.$Pers->Foto))
        {
            Persona::destroy($id);
        }
        
        return redirect('Persona')->with('mensaje','Empleado borrado con exito');
    }
}


