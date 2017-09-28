@extends('admin.layouts.app')
@section('content')

{!! Form::open(['route' => ['locals.store'], 'method' => 'POST']) !!}

<h3>Crear local</h3>
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
            {!! Form::text('nombre',null,['class' => 'form-control','placeholder'=>'Nombre de la categoria', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('direccion','Direccion') !!}
            {!! Form::text('direccion',null,['class' => 'form-control','placeholder'=>'Nombre de la categoria', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('telefono','Telefono') !!}
            {!! Form::text('telefono',null,['class' => 'form-control','placeholder'=>'Nombre de la categoria', 'required']) !!}
            
        </div>

       

        <div class="form-group">
        
            {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
        
        </div>

{!! Form::close() !!}

@endsection