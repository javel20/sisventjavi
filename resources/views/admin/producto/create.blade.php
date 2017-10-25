@extends('admin.layouts.app')
@section('content')

{!! Form::open(['route' => ['productos.store'], 'method' => 'POST', 'files'=> true]) !!}

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
        
            {!! Form::label('codigo','Codigo') !!}
            {!! Form::text('codigo',null,['class' => 'form-control','placeholder'=>'Nombre del trabajador','maxlength'=>'20', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('nombre','Nombre') !!}
            {!! Form::text('nombre',null,['class' => 'form-control','placeholder'=>'Nombre del trabajador','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('imagen','Imagen') !!}
            {!! Form::file('imagen') !!}
            
        </div>

        
        <div class="form-group">
        
            {!! Form::label('descripcion','Descripcion') !!}
            {!! Form::text('descripcion',null,['class' => 'form-control','placeholder'=>'Descripcion','maxlength'=>'250']) !!}
            
        </div>


        <div class="form-group">

            {!! Form::label('categoria','Categoria') !!}
            {!! Form::select('categoria',$categorias,null ,['class' => 'form-control select-tag', 'required']) !!}
            
        </div>

       
        <div class="form-group">
        
            {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
        
        </div>

{!! Form::close() !!}

@endsection