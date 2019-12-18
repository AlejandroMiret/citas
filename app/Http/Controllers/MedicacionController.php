<?php

namespace App\Http\Controllers;

use App\Medicacion;
use App\Medicina;
use App\Tratamiento;
use Illuminate\Http\Request;

class MedicacionController extends Controller
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
        //
        $medicaciones = Medicacion::all();
        return view('medicaciones/index',['medicaciones'=>$medicaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tratamientos = Tratamiento::all()->pluck('descripcion','id');

        $medicinas = Medicina::all()->pluck('name','id');

        return view('medicaciones/create',['tratamientos'=>$tratamientos, 'medicinas'=>$medicinas]);
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
        'unidades'=>'required|max:2',
        'frecuencia' => 'required|max:175',
        'instrucciones' => 'required|max:800',
        'fecha_inicio' => 'required|date|after:now',
        'fecha_fin' => 'required|date|after:fecha_inicio',
        'tratamiento_id' => 'required|exists:tratamientos,id',
        'medicina_id' => 'required|exists:medicinas,id'

    ]);
        $medicacion= new Medicacion($request->all());
        $medicacion->save();

        flash('Medicación creada correctamente');
        return redirect()->route('medicaciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicacion  $medicacion
     * @return \Illuminate\Http\Response
     */
    public function show(Medicacion $medicacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicacion  $medicacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $medicacion = Medicacion::find($id);

        $tratamientos = Tratamiento::all()->pluck('descripcion','id');

        $medicinas = Medicina::all()->pluck('name','id');

        return view('medicaciones/edit',['medicacion'=> $medicacion, 'tratamientos'=>$tratamientos, 'medicinas'=>$medicinas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicacion  $medicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'unidades'=>'required|max:2',
            'frecuencia' => 'required|max:175',
            'instrucciones' => 'required|max:800',
            'fecha_inicio' => 'required|date|after:now',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'tratamiento_id' => 'required|exists:tratamientos,id',
            'medicina_id' => 'required|exists:medicinas,id'

        ]);

        $medicacion = Medicacion::find($id);
        $medicacion->fill($request->all());
        $medicacion->save();
        flash('Medicacion actualizada correctamente');

        return redirect()->route('medicaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicacion  $medicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $medicacion=Medicacion::find($id);
        $medicacion->delete();
        flash('Medicacion borrada correctamente');
        return redirect()->route('medicaciones.index');
    }
}
