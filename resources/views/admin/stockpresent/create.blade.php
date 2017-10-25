@extends('admin.layouts.app')
@section('content')

{!! Form::open(['route' => ['stockpresent.store'], 'method' => 'POST']) !!}

<h3>Crear nuevo stock-presentacion</h3>

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
        
            {!! Form::label('stockminimo','Stock minimo') !!}
            {!! Form::text('stockmin',null,['class' => 'form-control','placeholder'=>'ingrese stock minimo','maxlength'=>'8', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('stockreal','Stock real') !!}
            {!! Form::text('stockreal',null,['class' => 'form-control','placeholder'=>'ingrese stock real','maxlength'=>'8', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('ganancia','Porcentaje de ganancia') !!}
            {!! Form::text('porc_ganancia',null,['class' => 'form-control','placeholder'=>'%','maxlength'=>'100', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('precioventa','Precio Venta') !!}
            {!! Form::text('precioventa',null,['class' => 'form-control','placeholder'=>'Precio venta','maxlength'=>'9', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('descripcion','Descripcion') !!}
            {!! Form::text('descripcion',null,['class' => 'form-control','placeholder'=>'Descripcion','maxlength'=>'250']) !!}
            
        </div>


        <div class="form-group">

            {!! Form::label('prod','Producto') !!}
            {!! Form::select('producto',$productos,null ,['class' => 'form-control select-tag', 'required']) !!}
            
        </div>

       
        <div class="form-group">
        
            {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
        
        </div>

{!! Form::close() !!}

@endsection