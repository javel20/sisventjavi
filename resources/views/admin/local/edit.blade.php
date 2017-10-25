@extends('admin.layouts.app')
@section('content')

{!! Form::open(['route' => ['locals.update',$local], 'method' => 'PUT']) !!}

    <h3>Editar local:</h3>

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
        {!! Form::text('nombre',$local->nombre,['class' => 'form-control','placeholder'=>'Nombre de la categoria','maxlength'=>'80', 'required']) !!}
        
    </div>

    <div class="form-group">

        {!! Form::label('direccion','Direccion') !!}
        {!! Form::text( 'direccion',$local->direccion,['class' => 'form-control','placeholder'=>'Nombre de la direccion','maxlength'=>'80', 'required']) !!}
        
    </div>

    <div class="form-group">

        {!! Form::label('telefono','Telefono') !!}
        {!! Form::text('telefono',$local->telefono,['class' => 'form-control','placeholder'=>'Nombre de la categoria','maxlength'=>'8', 'required']) !!}
        
    </div>

    <div class="form-group">

        {!! Form::label('estado','Estado') !!}
        {!! Form::select('estado',['0'=>'Seleccione una opción','activo'=>'activo','inactivo'=>'inactivo'],$local->estado,['class' => 'form-control', 'required']) !!}
        
    </div>



    <div class="form-group">

        {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}

    </div>

{!! Form::close() !!}

@endsection