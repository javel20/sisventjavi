@extends('admin.layouts.app')
@section('content')

{!! Form::open(['route' => ['categorias.update',$categoria], 'method' => 'PUT']) !!}

<h3>Editar categoria de producto</h3>
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
            {!! Form::text('nombre',$categoria->nombre,['class' => 'form-control','placeholder'=>'Nombre de la categoria','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('descripcion','Descripcion') !!}
            {!! Form::text('descripcion',$categoria->descripcion,['class' => 'form-control','placeholder'=>'Nombre de la direccion','maxlength'=>'250', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">

        {!! Form::label('estado','Estado') !!}
        {!! Form::select('estado',['0'=>'Seleccione una opción','activo'=>'activo','inactivo'=>'inactivo'],$categoria->estado,['class' => 'form-control', 'required']) !!}
        
    </div>


        <div class="form-group col-md-12">
        
            {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
        
        </div>

{!! Form::close() !!}

@endsection