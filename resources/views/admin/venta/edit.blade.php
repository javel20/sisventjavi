@extends('admin.layouts.app')
@section('content')

{!! Form::open(['route' => ['ventas.update',$venta], 'method' => 'PUT']) !!}

<h3>Editar venta</h3>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


    <div class="container-fluid">
        <div class="form-group col-md-6">
        
            {!! Form::label('codigo','Codigo') !!}
            {!! Form::text('codigo',$venta->codigo,['class' => 'form-control','readonly'=>'readonly','placeholder'=>'Codigo de la venta','maxlength'=>'9', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('fechaventa','Fecha') !!}
            {!! Form::text('fechaventa',$venta->fechaventa,['class' => 'form-control','placeholder'=>'aaaa/mm/dd','maxlength'=>'10', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('totalventa','Total venta') !!}
            {!! Form::text('totalventa',$venta->totalventa,['class' => 'form-control','placeholder'=>'S/. ','maxlength'=>'10', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('descripcion','Descripcion') !!}
            {!! Form::text('descripcion',$venta->descripcion,['class' => 'form-control','placeholder'=>'Descripcion','maxlength'=>'250']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('cliente','Cliente') !!}
            {!! Form::select('cliente',$clientes,$venta->cliente->id ,['class' => 'form-control select-tag', 'required']) !!}
            
        </div>

        <div class="form-group col-md-12">
        
            {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
        
        </div>

{!! Form::close() !!}

@endsection