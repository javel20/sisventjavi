@extends('admin.layouts.app')
@section('content')

{!! Form::open(['route' => ['trabajadors.store'], 'method' => 'POST']) !!}

<h3>Crear nuevo trabajador</h3>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <div class="form-group">
        
            {!! Form::label('nombre','Nombre') !!}
            {!! Form::text('nombre',null,['class' => 'form-control','placeholder'=>'Nombre del trabajador','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('apellidopat','Apellido paterno') !!}
            {!! Form::text('apellidopat',null,['class' => 'form-control','placeholder'=>'apellido paterno','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('apellidomat','Apellido materno') !!}
            {!! Form::text('apellidomat',null,['class' => 'form-control','placeholder'=>'apellido materno','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('DNI','DNI') !!}
            {!! Form::text('DNI',null,['class' => 'form-control','placeholder'=>'DNI','maxlength'=>'8', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('direccion','Direccion') !!}
            {!! Form::text('direccion',null,['class' => 'form-control','placeholder'=>'Direccion','maxlength'=>'100', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('celular','Celular') !!}
            {!! Form::text('celular',null,['class' => 'form-control','placeholder'=>'Numero de celular','maxlength'=>'9', 'required']) !!}
            
        </div>

        <div class="form-group">
        
                {!! Form::label('operador','Operador') !!}
                {!! Form::select('operador',['0'=>'Seleccione una opción','Movistar'=>'Movistar','Claro'=>'Claro','Bitel'=>'Bitel','Entel'=>'Entel'],null,['class' => 'form-control select-tag', 'required']) !!}
                
        </div>

        <div class="form-group">
        
            {!! Form::label('descripcion','Descripcion') !!}
            {!! Form::text('descripcion',null,['class' => 'form-control','placeholder'=>'Descripcion','maxlength'=>'250']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('locals','Local') !!}
            {!! Form::select('local',$locals,null ,['class' => 'form-control select-tag', 'required']) !!}
            
        </div>

        <div class="form-group">

            {!! Form::label('tipoTrabajador','Tipo Trabajador') !!}
            {!! Form::select('tipotrab',$tipotrabs,null ,['class' => 'form-control select-tag', 'required']) !!}
            
        </div>

       
        <div class="form-group">
        
            {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
        
        </div>

{!! Form::close() !!}

@endsection