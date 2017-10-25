@extends('admin.layouts.app')
@section('content')

{!! Form::open(['route' => ['accesos.store'], 'method' => 'POST']) !!}

<h3>Crear acceso</h3>
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
            {!! Form::text('nombre',null,['class' => 'form-control','placeholder'=>'Nombre de la acceso','maxlength'=>'80', 'required']) !!}
            
        </div>

       

        <div class="form-group">
        
            {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
        
        </div>

{!! Form::close() !!}

@endsection