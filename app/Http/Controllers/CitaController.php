<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Cita;
use App\Medico;
use App\Paciente;
use App\Location;
use mysql_xdevapi\Table;


class CitaController extends Controller
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
        $citas = Cita::all()->where('fecha_hora','>',Carbon::now());

        return view('citas/index',['citas'=>$citas]);
    }

    public function citasPasadas()
    {
        $citas = Cita::all()->where('fecha_hora','<',Carbon::now());

        return view('citas/citasPasadas',['citas'=>$citas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CitasPorPaciente($id)
    {
        $citas=Cita::all()->where('paciente_id','=',$id);


        return view('pacientes/indexCitasPorPaciente',['citas'=>$citas]);
    }
    public function create()
    {
        $medicos = Medico::all()->pluck('full_name','id');

        $pacientes = Paciente::all()->pluck('full_name','id');

        $locations = Location::all()->pluck('full_name','id');


        return view('citas/create',['medicos'=>$medicos, 'pacientes'=>$pacientes, 'locations'=>$locations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'location_id' => 'required|exists:locations,id',
            'fecha_hora' => 'required|date|after:now'
        ]);

        $cita = new Cita($request->all());
        $cita->save();

        $min15 = new \DateInterval('PT15M');
        $fecha_inicio = new \DateTime($cita-> fecha_hora);
        $fecha_inicio -> createFromFormat('Y-m-d\Th:i', $cita->fecha_hora);
        $cita->duration = $fecha_inicio -> add($min15);
        $cita->save();


        flash('Cita creada correctamente');

        return redirect()->route('citas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $cita = Cita::find($id);

        $medicos = Medico::all()->pluck('full_name','id');

        $pacientes = Paciente::all()->pluck('full_name','id');

        $locations = Location::all()->pluck('full_name','id');


        return view('citas/edit',['cita'=> $cita, 'medicos'=>$medicos, 'pacientes'=>$pacientes, 'locations'=>$locations]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'location_id' => 'required|exists:locations,id',
            'fecha_hora' => 'required|date|after:now'
        ]);
        $cita = Cita::find($id);
        $cita->fill($request->all());



        $min15 = new \DateInterval('PT15M');
        $fecha_inicio = new \DateTime($cita-> fecha_hora);
        $fecha_inicio -> createFromFormat('Y-m-d\Th:i', $cita->fecha_hora);
        $cita->duration = $fecha_inicio -> add($min15);
        $cita->save();

        $cita->save();

        flash('Cita modificada correctamente');

        return redirect()->route('citas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita = Cita::find($id);
        $cita->delete();
        flash('Cita borrada correctamente');

        return redirect()->route('citas.index');
    }
}
