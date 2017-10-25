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
        
            {!! Form::label('nombre','Nombre') !!}
            {!! Form::text('nombre',$user->nombre,['class' => 'form-control','placeholder'=>'Nombre del user','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('apellidopat','Apellido paterno') !!}
            {!! Form::text('apellidopat',$user->apellidopat,['class' => 'form-control','placeholder'=>'apellido paterno','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('apellidomat','Apellido materno') !!}
            {!! Form::text('apellidomat',$user->apellidomat,['class' => 'form-control','placeholder'=>'apellido materno','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('DNI','DNI') !!}
            {!! Form::text('DNI',$user->DNI,['class' => 'form-control','placeholder'=>'DNI','maxlength'=>'8', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('direccion','Direccion') !!}
            {!! Form::text('direccion',$user->direccion,['class' => 'form-control','placeholder'=>'Direccion','maxlength'=>'100', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('celular','Celular') !!}
            {!! Form::text('celular',$user->celular,['class' => 'form-control','placeholder'=>'Numero de celular','maxlength'=>'9', 'required']) !!}
            
        </div>

        <div class="form-group">
        
                {!! Form::label('operador','Operador') !!}
                {!! Form::select('operador',['0'=>'Seleccione una opción','Movistar'=>'Movistar','Claro'=>'Claro','Bitel'=>'Bitel','Entel'=>'Entel'],$user->operador,['class' => 'form-control select-tag', 'required']) !!}
                
        </div>

        <div class="form-group">
        
                {!! Form::label('estado','Estado') !!}
                {!! Form::select('estado',['0'=>'Seleccione una opción','Activo'=>'Activo','Inactivo'=>'Inactivo'],$user->estado,['class' => 'form-control select-tag', 'required']) !!}
                
        </div>

        <div class="form-group">
        
            {!! Form::label('descripcion','Descripcion') !!}
            {!! Form::text('descripcion',$user->descripcion,['class' => 'form-control','placeholder'=>'Descripcion','maxlength'=>'250']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('locals','Local') !!}
            {!! Form::select('local',$locals,$user->local->id ,['class' => 'form-control select-tag', 'required']) !!}
            
        </div>

        

        <div class="form-group">
        
            {!! Form::label('tipotrabajador','Tipo trabajador') !!}
            {!! Form::select('tipotrabajador',$tipotrabs,$user->tipotrabajador->id ,['class' => 'form-control select-tag', 'required']) !!}
                    
        </div>

        <div class="form-group">
        
            {!! Form::label('accesos','Accesos') !!}
            {!! Form::select('accesos[]',$accesos,$my_users ,['class' => 'form-control select-tag','multiple', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
        
        </div>

    {!! Form::close() !!}

@endsection