@extends('admin.layouts.app')
@section('content')

{!! Form::open(['route' => ['licencias.update',$licencia], 'method' => 'PUT']) !!}

<h3>Editar licencia</h3>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <div class="form-group col-md-6">
        
            {!! Form::label('nombre','Nombre') !!}
            {!! Form::text('nombre',$licencia->nombre,['class' => 'form-control','placeholder'=>'Nombre del trabajador','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('fechai','Fecha inicio') !!}
            {!! Form::date('fechai',$licencia->fechai,['class' => 'form-control','placeholder'=>'apellido paterno','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('fechaf','Fecha final') !!}
            {!! Form::date('fechaf',$licencia->fechaf,['class' => 'form-control','placeholder'=>'apellido materno','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">

            {!! Form::label('user','Trabajador') !!}
            {!! Form::select('user',$users,$licencia->user->id ,['class' => 'form-control select-tag', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
                {!! Form::label('estado','Estado') !!}
                {!! Form::select('estado',['0'=>'Seleccione una opción','Con permiso'=>'Con permiso','De retorno'=>'De retorno'],$licencia->estado,['class' => 'form-control select-tag', 'required']) !!}
                
        </div>
        
        <div class="form-group col-md-6">
        
            {!! Form::label('descripcion','Descripcion') !!}
            {!! Form::text('descripcion',$licencia->descripcion,['class' => 'form-control','placeholder'=>'Descripcion','maxlength'=>'250']) !!}
            
        </div>

       
        <div class="form-group col-md-12">
        
            {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
        
        </div>

{!! Form::close() !!}

@endsection