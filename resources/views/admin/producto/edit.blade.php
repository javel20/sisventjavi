@extends('admin.layouts.app')
@section('content')

{!! Form::open(['route' => ['productos.update',$producto], 'method' => 'PUT', 'files'=> true]) !!}

<h3>Editar producto</h3>

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
            {!! Form::text('codigo',$producto->codigo,['class' => 'form-control','placeholder'=>'Nombre del trabajador','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('nombre','Nombre') !!}
            {!! Form::text('nombre',$producto->nombre,['class' => 'form-control','placeholder'=>'Nombre del trabajador','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('imagen','Imagen') !!}
            {!! Form::file('imagen') !!}
            
                <img src="{{ asset('images/productos/'.$producto->imagen) }}" height="150px" width="150px" alt="">
            
            
        </div>

        <div class="form-group col-md-6">
        
                {!! Form::label('estado','Estado') !!}
                {!! Form::select('estado',['0'=>'Seleccione una opción','Activo'=>'Activo','Inactivo'=>'Inactivo'],$producto->estado,['class' => 'form-control select-tag', 'required']) !!}
                
        </div>
        
        <div class="form-group col-md-6">
        
            {!! Form::label('descripcion','Descripcion') !!}
            {!! Form::text('descripcion',$producto->descripcion,['class' => 'form-control','placeholder'=>'Descripcion','maxlength'=>'250']) !!}
            
        </div>


        <div class="form-group col-md-6">

            {!! Form::label('categoria','Categoria') !!}
            {!! Form::select('categoria',$categorias,$producto->categoria->id ,['class' => 'form-control select-tag', 'required']) !!}
            
        </div>

       
        <div class="form-group col-md-12">
        
            {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
        
        </div>

{!! Form::close() !!}

@endsection