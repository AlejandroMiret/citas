@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear cita</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($cita, [ 'route' => ['citas.update',$cita->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('fecha_hora', 'Fecha y hora de la cita') !!}


                            <input type="datetime-local" id="fecha_hora" name="fecha_hora" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d\Th:i')}}" />


                        </div>

                        <div class="form-group">
                            {!!Form::label('medico_id', 'Medico') !!}
                            <br>
                            {!! Form::select('medico_id', $medicos, $cita->medico_id, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('paciente_id', 'Paciente') !!}
                            <br>
                            {!! Form::select('paciente_id', $pacientes, $cita->paciente_id, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('location_id', 'Location') !!}
                            <br>
                            {!! Form::select('location_id', $locations, $cita->location_id, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('duration', 'Fecha y hora de finalización de la cita') !!}


                            <input type="datetime-local" id="duration" name="duration" class="form-control" value="{{Carbon\Carbon::now()->addMinutes(15)->format('Y-m-d\Th:i')}}" />


                        </div>

                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection