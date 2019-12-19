@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Citas por paciente</div>

                    <div class="panel-body">
                        {!! Form::open(['route' => 'pacientes.index', 'method' => 'get']) !!}
                        {!!   Form::submit('Todos los pacientes', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>

                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Fecha</th>
                                <th>Medico</th>
                                <th>Localización</th>
                                <th>Fecha de finalización</th>

                            </tr>

                            @foreach ($citas as $cita)


                                <tr>
                                    <td>{{ $cita->fecha_hora }}</td>
                                    <td>{{ $cita->medico->full_name }}</td>
                                    <td>{{ $cita->location->full_name}}</td>
                                    <td>{{ $cita->duration }}</td>



                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection