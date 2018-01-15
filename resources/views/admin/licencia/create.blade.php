@extends('admin.layouts.app')
@section('content')

{!! Form::open(['route' => ['licencias.store'], 'method' => 'POST']) !!}

<h3>Crear nuevo licencia</h3>

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
            {!! Form::text('nombre',null,['class' => 'form-control','placeholder'=>'Nombre del licencia','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('fechai','Fecha inicio') !!}
            {!! Form::date('fechai',null,['class' => 'form-control','placeholder'=>'apellido paterno','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('fechaf','Fecha final') !!}
            {!! Form::date('fechaf',null,['class' => 'form-control','placeholder'=>'apellido materno','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">

            {!! Form::label('user','Trabajador') !!}
            {!! Form::select('user',$users,null ,['class' => 'form-control select-tag', 'required']) !!}
            
        </div>


        <div class="form-group col-md-6">
        
            {!! Form::label('descripcion','Descripcion') !!}
            {!! Form::text('descripcion',null,['class' => 'form-control','placeholder'=>'Descripcion','maxlength'=>'250']) !!}
            
        </div>

  
       
        <div class="form-group col-md-12">
        
            {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
        
        </div>

{!! Form::close() !!}

@endsection