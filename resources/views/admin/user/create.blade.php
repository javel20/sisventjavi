@extends('admin.layouts.app')
@section('content')

<h3>Crear usuario</h3>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

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


        <div class="form-group col-md-6">
        
            {!! Form::label('nombre','Nombre') !!}
            {!! Form::text('nombre',null,['class' => 'form-control','placeholder'=>'Nombre del trabajador','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('apellidopat','Apellido paterno') !!}
            {!! Form::text('apellidopat',null,['class' => 'form-control','placeholder'=>'apellido paterno','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('apellidomat','Apellido materno') !!}
            {!! Form::text('apellidomat',null,['class' => 'form-control','placeholder'=>'apellido materno','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('DNI','DNI') !!}
            {!! Form::text('DNI',null,['class' => 'form-control','placeholder'=>'DNI','maxlength'=>'8', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('direccion','Direccion') !!}
            {!! Form::text('direccion',null,['class' => 'form-control','placeholder'=>'Direccion','maxlength'=>'100', 'required']) !!}
            
        </div>

        <div class="form-group col-md-3">
        
            {!! Form::label('celular','Celular') !!}
            {!! Form::text('celular',null,['class' => 'form-control','placeholder'=>'Numero de celular','maxlength'=>'9', 'required']) !!}
            
        </div>

        <div class="form-group col-md-3">
        
                {!! Form::label('operador','Operador') !!}
                {!! Form::select('operador',['0'=>'Seleccione una opción','Movistar'=>'Movistar','Claro'=>'Claro','Bitel'=>'Bitel','Entel'=>'Entel'],null,['class' => 'form-control select-tag', 'required']) !!}
                
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('descripcion','Descripcion') !!}
            {!! Form::text('descripcion',null,['class' => 'form-control','placeholder'=>'Descripcion','maxlength'=>'250']) !!}
            
        </div>


        <div class="form-group col-md-6">
        
            {!! Form::label('email','Correo Electronico') !!}
            {!! Form::email('email',null,['class' => 'form-control','placeholder'=>'example@example.com', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('password','Contraseña') !!}
            {!! Form::password('password',['class' => 'form-control','placeholder'=>'******', 'required']) !!}
            
        </div>


        <div class="form-group col-md-6">
        
            {!! Form::label('tipotrabajador','Tipo Trabajador') !!}
            {!! Form::select('tipotrabajador',$tipotrabs,null ,['class' => 'form-control select-tag','single', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('local','Local') !!}
            {!! Form::select('local',$locals,null ,['class' => 'form-control select-tag','single', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('accesos','Accesos') !!}
            {!! Form::select('accesos[]',$accesos,null ,['class' => 'form-control select-tag','multiple', 'required']) !!}
            
        </div>



        <div class="form-group col-md-12">
        
            {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
        
        </div>

    {!! Form::close() !!}

@endsection