@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Medicacion</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'medicaciones.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear medicación', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Fecha inicio</th>
                                <th>Fecha fin</th>
                                <th>Unidad/es</th>
                                <th>Frecuencia</th>
                                <th>Instrucciones</th>
                                <th>Tratamiento</th>
                                <th>Medicina</th>
                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($medicaciones as $medicacion)


                                <tr>
                                    <td>{{ $medicacion->fecha_inicio }}</td>
                                    <td>{{ $medicacion->fecha_fin }}</td>
                                    <td>{{ $medicacion->unidades }}</td>
                                    <td>{{ $medicacion->frecuencia  }}</td>
                                    <td>{{ $medicacion->instrucciones  }}</td>
                                    <td>{{ $medicacion->tratamiento->descripcion  }}</td>
                                    <td>{{ $medicacion->medicina->name  }}</td>
                                    <td>
                                        {!! Form::open(['route' => ['medicaciones.edit',$medicacion->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['medicaciones.destroy',$medicacion->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está usted seguro yii?"))event.preventDefault();'])!!}
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