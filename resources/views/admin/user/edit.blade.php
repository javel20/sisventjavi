@extends('admin.layouts.app')
@section('content')

    {!! Form::open(['route' => ['users.update',$user], 'method' => 'PUT']) !!}

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
        
            {!! Form::label('email','Correo Electronico') !!}
            {!! Form::email('email',$user->email,['class' => 'form-control','placeholder'=>'example@example.com', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('Trabajador','Trabajador') !!}
            {!! Form::select('trabajador',$trabs,$user->trabajador->id ,['class' => 'form-control select-tag', 'required']) !!}
                    
        </div>

        <div class="form-group">
        
                {!! Form::label('estado','Estado') !!}
                {!! Form::select('estado',['0'=>'Seleccione una opción','activo'=>'activo','inactivo'=>'inactivo'],$user->estado,['class' => 'form-control select-tag', 'required']) !!}
                
        </div>

        <div class="form-group">
        
            {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
        
        </div>

    {!! Form::close() !!}

@endsection