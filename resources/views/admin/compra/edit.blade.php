@extends('admin.layouts.app')
@section('content')

{!! Form::open(['route' => ['compras.update',$compra], 'method' => 'PUT']) !!}

<h3>Editar compra</h3>

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
        
            {!! Form::label('codigo','Codigo') !!}
            {!! Form::text('codigo',$compra->codigo,['class' => 'form-control','readonly'=>'readonly','placeholder'=>'Codigo de la compra','maxlength'=>'12', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('fechacompra','Fecha') !!}
            {!! Form::date('fechacompra',$compra->fechacompra,['class' => 'form-control','placeholder'=>'aaaa/mm/dd','maxlength'=>'10', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('totalcompra','Total compra') !!}
            {!! Form::text('totalcompra',$compra->totalcompra,['class' => 'form-control','placeholder'=>'apellido materno','maxlength'=>'80', 'required']) !!}
            
        </div>


        <div class="form-group col-md-6">
        
            {!! Form::label('descripcion','Descripcion') !!}
            {!! Form::text('descripcion',$compra->descripcion,['class' => 'form-control','placeholder'=>'Descripcion','maxlength'=>'250']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('proveedor','Empresa proveedora') !!}
            {!! Form::select('proveedor',$proveedors,$compra->proveedor->id ,['class' => 'form-control select-tag', 'required']) !!}
            
        </div>


       
        <div class="form-group col-md-12">
        
            {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
        
        </div>

{!! Form::close() !!}

@endsection