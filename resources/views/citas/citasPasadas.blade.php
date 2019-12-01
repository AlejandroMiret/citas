@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Citas pasadas</div>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Fecha</th>
                                <th>Medico</th>
                                <th>Paciente</th>
                                <th>Localización</th>

                            </tr>

                            @foreach ($citas as $cita)
                                $fecha_cita=$cita->fecha_hora;
                                $ahora=getdate().date();
                                @if ($fecha_cita<$ahora)
)

                                <tr>
                                    <td>{{ $cita->fecha_hora }}</td>
                                    <td>{{ $cita->medico->full_name }}</td>
                                    <td>{{ $cita->paciente->full_name}}</td>
                                    <td>{{ $cita->location->full_name}}</td>

                                </tr>
                                @endif



                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection