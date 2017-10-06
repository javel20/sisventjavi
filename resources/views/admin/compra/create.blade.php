@extends('admin.layouts.app')
@section('content')

{!! Form::open(['route' => ['compras.store'], 'method' => 'POST']) !!}

<h3>Crear nueva compra</h3>

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
        
            {!! Form::label('codigo','Codigo') !!}
            {!! Form::text('codigo',null,['class' => 'form-control','placeholder'=>'Codigo de la compra','maxlength'=>'12', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('fechacompra','Fecha') !!}
            {!! Form::text('fechacompra',null,['class' => 'form-control','placeholder'=>'aaaa/mm/dd','maxlength'=>'10', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('totalcompra','Total compra') !!}
            {!! Form::text('totalcompra',null,['class' => 'form-control','placeholder'=>'apellido materno','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('descripcion','Descripcion') !!}
            {!! Form::text('descripcion',null,['class' => 'form-control','placeholder'=>'Descripcion','maxlength'=>'250']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('proveedor','Empresa proveedora') !!}
            {!! Form::select('proveedor',$proveedors,null ,['class' => 'form-control select-tag', 'required']) !!}
            
        </div>


       
        <div class="form-group">
        
            {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
        
        </div>

{!! Form::close() !!}

@endsection