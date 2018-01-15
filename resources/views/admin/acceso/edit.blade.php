@extends('admin.layouts.app')
@section('content')

{!! Form::open(['route' => ['accesos.update',$acceso], 'method' => 'PUT']) !!}

<h3>Editar acceso</h3>
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
            {!! Form::text('nombre',$acceso->nombre,['class' => 'form-control','placeholder'=>'Nombre de la acceso','maxlength'=>'80', 'required']) !!}
            
        </div>

       

        <div class="form-group col-md-12">
        
            {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
        
        </div>

{!! Form::close() !!}

@endsection