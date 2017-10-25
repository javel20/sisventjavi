@extends('admin.layouts.app')
@section('content')

{!! Form::open(['route' => ['proveedor.update',$proveedor], 'method' => 'PUT']) !!}

    <h3>Crear cliente</h3>
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
        
            {!! Form::label('ruc','RUC') !!}
            {!! Form::text('RUC',$proveedor->RUC,['class' => 'form-control','placeholder'=>'Numero de RUC','maxlength'=>'12', 'required']) !!}
            
        </div>


        <div class="form-group">
        
            {!! Form::label('nombre','Nombre Empresa') !!}
            {!! Form::text('nombreempresa',$proveedor->nombre_empresa,['class' => 'form-control','placeholder'=>'Nombre del cliente','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('direccion','Direccion') !!}
            {!! Form::text('direccion',$proveedor->direccion,['class' => 'form-control','placeholder'=>'Direccion','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('nombrecontacto','Nombre Contacto') !!}
            {!! Form::text('nombrecontacto',$proveedor->nombre_contacto,['class' => 'form-control','placeholder'=>'Nombre del cliente','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('apellidopat','Apellido Paterno') !!}
            {!! Form::text('apellidopat',$proveedor->apellidopat,['class' => 'form-control','placeholder'=>'Apellido paterno del cliente','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('apellidomat','Apellido Materno') !!}
            {!! Form::text('apellidomat',$proveedor->apellidomat,['class' => 'form-control','placeholder'=>'Apellido materno del cliente','maxlength'=>'80', 'required']) !!}
            
        </div>


        <div class="form-group">
        
            {!! Form::label('celular','Celular') !!}
            {!! Form::text('celularcont',$proveedor->celular_contacto,['class' => 'form-control','placeholder'=>'Numero de celular','maxlength'=>'9', 'required']) !!}
            
        </div>

        <div class="form-group">
        
                {!! Form::label('operador','Operador') !!}
                {!! Form::select('operador',['0'=>'Seleccione una opción','Movistar'=>'Movistar','Claro'=>'Claro','Bitel'=>'Bitel','Entel'=>'Entel'],$proveedor->operador,['class' => 'form-control select-tag', 'required']) !!}
                
        </div>

        <div class="form-group">
        
            {!! Form::label('email','Email') !!}
            {!! Form::text('email',$proveedor->email,['class' => 'form-control','placeholder'=>'Ejm:asd@asd.com','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group">

            {!! Form::label('estado','Estado') !!}
            {!! Form::select('estado',['0'=>'Seleccione una opción','activo'=>'activo','inactivo'=>'inactivo'],$proveedor->estado,['class' => 'form-control', 'required']) !!}
        
        </div>

        <div class="form-group">
        
            {!! Form::label('descripcion','Descripcion') !!}
            {!! Form::text('descripcion',$proveedor->descripcion,['class' => 'form-control','placeholder'=>'Descripcion','maxlength'=>'250']) !!}
            
        </div>

       

        <div class="form-group">
        
            {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
        
        </div>

{!! Form::close() !!}

@endsection