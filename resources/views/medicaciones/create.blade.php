@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear medicación</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'medicaciones.store']) !!}
                        <div class="form-group">
                            {!! Form::label('fecha_inicio', 'Fecha de inicio de la preescripción') !!}
                            <input type="datetime-local" id="fecha_inicio" name="fecha_inicio" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d\Th:i')}}" />
                        </div>
                        <div class="form-group">
                            {!! Form::label('fecha_fin', 'Fecha de finalización de la preescripción') !!}
                            <input type="datetime-local" id="fecha_fin" name="fecha_fin" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d\Th:i')}}" />
                        </div>
                        <div class="form-group">
                            {!! Form::label('unidades', 'Dosis de medicina a suministrar') !!}
                            {!! Form::text('unidades',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('frecuencia', 'Frecuencia de la suministración') !!}
                            {!! Form::text('frecuencia',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('instrucciones', 'Cómo suministrar el medicamento') !!}
                            {!! Form::text('instrucciones',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('tratamiento_id', 'Descripción del tratamiento') !!}
                            <br>
                            {!! Form::select('tratamiento_id', $tratamientos, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('medicina_id', 'Medicamento del tratamiento') !!}
                            <br>
                            {!! Form::select('medicina_id', $medicinas, ['class' => 'form-control']) !!}

                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection