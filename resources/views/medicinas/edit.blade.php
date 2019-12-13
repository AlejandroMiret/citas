@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar medicina</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($medicina, [ 'route' => ['medicinas.update',$medicina->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Nombre de la medicina') !!}
                            {!! Form::text('name',$medicina->name,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('composition', 'Composición de la medicina') !!}
                            {!! Form::text('composition',$medicina->composition,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('presentation', 'Descripción de la medicina') !!}
                            {!! Form::text('presentation',$medicina->presentation,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('link', 'Link a Vademecum de la medicina') !!}
                            {!! Form::text('link',$medicina->link,['class'=>'form-control', 'required']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection