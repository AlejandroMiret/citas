@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Citas pasadas</div>
                    {{-- Esto se supone que es como el index, pero como el index no funciona, si le paso la ruta show o citasPasadas que he
                    creado en el controlador de citas tampoco funciona, por eso no se donde está el error de que la ruta no existe. de si es
                    del controlador o si es del botón al crearlo en el index para que me lleve a citas pasadas--}}
                    <div class="panel-body">
                        {!! Form::open(['route' => 'citas.index', 'method' => 'get']) !!}
                        {!!   Form::submit('Ver citas futuras', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>

                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Fecha</th>
                                <th>Medico</th>
                                <th>Paciente</th>
                                <th>Localización</th>
                                <th colspan="1">Acciones</th>

                            </tr>

                            @foreach ($citas as $cita)

                                <tr>
                                    <td>{{ $cita->fecha_hora }}</td>
                                    <td>{{ $cita->medico->full_name }}</td>
                                    <td>{{ $cita->paciente->full_name}}</td>
                                    <td>{{ $cita->location->full_name}}</td>

                                    <td>
                                        {!! Form::open(['route' => ['citas.destroy',$cita->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}

                                    </td>

                                </tr>

                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection