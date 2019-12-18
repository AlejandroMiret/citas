<?php

namespace App\Http\Controllers;

use App\Medicina;
use App\Paciente;
use App\Tratamiento;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tratamientos = Tratamiento::all();
        return view('tratamientos/index',['tratamientos'=>$tratamientos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pacientes = Paciente::all()->pluck('full_name','id');
        $medicinas = Medicina::all()->pluck('name','id');
        return view('tratamientos/create',['pacientes'=>$pacientes, 'medicinas'=>$medicinas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'fecha_inicio' => 'required|date|after:now',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'descripcion' => 'required|max:255',
            'medicina_id' => 'required|exists:medicinas,id',
            'paciente_id' => 'required|exists:pacientes,id'
        ]);

        $tratamiento = new Tratamiento($request->all());
        $tratamiento->save();

        flash('Tratamiento creado correctamente');

        return redirect()->route('tratamientos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function show(Tratamiento $tratamiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tratamiento = Tratamiento::find($id);

        $pacientes= Paciente::all()->pluck('full_name','id');

        $medicinas= Medicina::all()->pluck('name','id');

        return view('tratamientos/edit',['tratamiento'=>$tratamiento,'medicinas'=>$medicinas ,'pacientes'=>$pacientes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $this->validate($request, [
            'fecha_inicio' => 'required|date|after:now',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'descripcion' => 'required|max:255',
            'medicina_id' => 'required|exists:medicinas,id',
            'paciente_id' => 'required|exists:pacientes,id'
        ]);
        $tratamiento = Tratamiento::find($id);
        $tratamiento->fill($request->all());
        $tratamiento->save();

        flash('Tratamiento actualizado correctamente');

        return redirect()->route('tratamientos.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tratamiento=Tratamiento::find($id);
        $tratamiento->delete();
        flash('Tratamiento borrado correctamente');
        return redirect()->route('tratamientos.index');
    }
}
