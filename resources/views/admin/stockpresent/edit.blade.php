@extends('admin.layouts.app')
@section('content')

{!! Form::open(['route' => ['stockpresent.update',$stockpresent], 'method' => 'PUT']) !!}

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
            {!! Form::text('nombre',$stockpresent->nombre,['class' => 'form-control','placeholder'=>'Nombre de la presentacion','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('stockminimo','Stock minimo') !!}
            {!! Form::text('stockmin',$stockpresent->stockmin,['class' => 'form-control','placeholder'=>'ingrese stock minimo','maxlength'=>'8', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('stockreal','Stock real') !!}
            {!! Form::text('stockreal',$stockpresent->stockreal,['class' => 'form-control','placeholder'=>'ingrese stock real','maxlength'=>'8', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('ganancia','Porcentaje de ganancia') !!}
            {!! Form::text('porc_ganancia',$stockpresent->porc_ganancia,['class' => 'form-control','placeholder'=>'%','maxlength'=>'100', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('precioventa','Precio Venta') !!}
            {!! Form::text('precioventa',$stockpresent->precioventa,['class' => 'form-control','placeholder'=>'Precio venta','maxlength'=>'9', 'required']) !!}
            
        </div>

        <div class="form-group">
        
                {!! Form::label('estado','Estado') !!}
                {!! Form::select('estado',['0'=>'Seleccione una opción','activo'=>'activo','inactivo'=>'inactivo'],$stockpresent->estado,['class' => 'form-control select-tag', 'required']) !!}
                
        </div>

        <div class="form-group">
        
            {!! Form::label('descripcion','Descripcion') !!}
            {!! Form::text('descripcion',$stockpresent->descripcion,['class' => 'form-control','placeholder'=>'Descripcion','maxlength'=>'250']) !!}
            
        </div>


        <div class="form-group">

            {!! Form::label('prod','Producto') !!}
            {!! Form::select('producto',$productos,$stockpresent->producto->id,['class' => 'form-control select-tag', 'required']) !!}
            
        </div>

       
        <div class="form-group">
        
            {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
        
        </div>

{!! Form::close() !!}

@endsection