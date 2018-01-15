@extends('admin.layouts.app')
@section('content')

{!! Form::open(['route' => ['tipotrabajador.update',$tipotrabs], 'method' => 'PUT']) !!}

<h3>Crear tipo trabajador</h3>
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
            {!! Form::text('nombre',$tipotrabs->nombre,['class' => 'form-control','placeholder'=>'Nombre de la categoria','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('descripcion','Descripcion') !!}
            {!! Form::text('descripcion',$tipotrabs->descripcion,['class' => 'form-control','placeholder'=>'Descripcion','maxlength'=>'250']) !!}
            
        </div>
       

        <div class="form-group col-md-12">
        
            {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
        
        </div>

{!! Form::close() !!}

@endsection