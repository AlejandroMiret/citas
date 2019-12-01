<?php

namespace App\Http\Controllers;

use App\Enfermedad;
use App\Especialidad;
use Illuminate\Http\Request;

class EnfermedadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enfermedades = Enfermedad::all();

        return view('enfermedades/index',['enfermedades'=>$enfermedades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidades = Especialidad::all()->pluck('name','id');

        return view('enfermedades/create',['especialidades'=>$especialidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'comun_name' => 'required|max:255',
            'especialidad_id' => 'required|exists:especialidads,id'
        ]);
        $enfermedades = new Enfermedad($request->all());
        $enfermedades->save();

        // return redirect('especialidades');

        flash('Enfermedad creado correctamente');

        return redirect()->route('enfermedades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function show(Enfermedad $enfermedad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enfermedades = Enfermedad::find($id);

        $especialidades = Especialidad::all()->pluck('name','id');


        return view('enfermedades/edit',['enfermedad'=> $enfermedades, 'especialidades'=>$especialidades ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'comun_name' => 'required|max:255',
            'especialidad_id' => 'required|exists:especialidads,id'
        ]);

        $enfermedades = Enfermedad::find($id);
        $enfermedades->fill($request->all());

        $enfermedades->save();

        flash('Enfermedad modificado correctamente');

        return redirect()->route('enfermedades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enfermedades = Enfermedad::find($id);
        $enfermedades->delete();
        flash('Enfermedad borrada correctamente');

        return redirect()->route('enfermedades.index');
    }
}
