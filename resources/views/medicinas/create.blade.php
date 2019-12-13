@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear medicina</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'medicinas.store']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Nombre de la medicina') !!}
                            {!! Form::text('name',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('composition', 'Composición de la medicina') !!}
                            {!! Form::text('composition',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('presentation', 'Presentación de la medicina') !!}
                            {!! Form::text('presentation',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('link', 'Link hacia la página web de la medicina') !!}
                            {!! Form::text('link',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection