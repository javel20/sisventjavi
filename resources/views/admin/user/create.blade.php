@extends('admin.layouts.app')
@section('content')

    {!! Form::open(['route' => ['users.store'], 'method' => 'POST']) !!}

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
            {!! Form::email('email',null,['class' => 'form-control','placeholder'=>'example@example.com', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('password','Contraseña') !!}
            {!! Form::password('password',['class' => 'form-control','placeholder'=>'******', 'required']) !!}
            
        </div>




        <div class="form-group">
        
            {!! Form::label('accesos','Accesos') !!}
            {!! Form::select('accesos[]',$accesos,null ,['class' => 'form-control select-tag','multiple', 'required']) !!}
            
        </div>



        <div class="form-group">
        
            {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
        
        </div>

    {!! Form::close() !!}

@endsection