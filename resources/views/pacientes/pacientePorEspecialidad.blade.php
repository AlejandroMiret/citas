@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Pacientes por especialidad</div>

                    <div class="panel-body">
                        {!! Form::open(['route' => 'pacientes.index', 'method' => 'get']) !!}
                        {!!   Form::submit('Todos los pacientes', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>

                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Nuhsa</th>
                                <th>Enfermedad</th>

                                <th colspan="3">Acciones</th>

                            </tr>

                            @foreach ($pacientes as $paciente)


                                <tr>
                                    <td>{{ $paciente->name }}</td>
                                    <td>{{ $paciente->surname }}</td>
                                    <td>{{ $paciente->nuhsa}}</td>
                                    <td>{{ $paciente->enfermedad->comun_name }}</td>

                                    <td>
                                        {!! Form::open(['route' => ['pacientes.edit',$paciente->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['pacientes.destroy',$paciente->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}

                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['pacientes.indexCitasPorPaciente',$paciente->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Ver citas del paciente', ['class'=> 'btn btn-primary'])!!}
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