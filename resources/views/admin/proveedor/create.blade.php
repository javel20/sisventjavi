@extends('admin.layouts.app')
@section('content')

{!! Form::open(['route' => ['proveedor.store'], 'method' => 'POST']) !!}

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
            {!! Form::text('RUC',null,['class' => 'form-control','placeholder'=>'Numero de RUC','maxlength'=>'12', 'required']) !!}
            
        </div>


        <div class="form-group">
        
            {!! Form::label('nombre','Nombre Empresa') !!}
            {!! Form::text('nombreempresa',null,['class' => 'form-control','placeholder'=>'Nombre del cliente','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('direccion','Direccion') !!}
            {!! Form::text('direccion',null,['class' => 'form-control','placeholder'=>'Direccion','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('nombrecontacto','Nombre Contacto') !!}
            {!! Form::text('nombrecontacto',null,['class' => 'form-control','placeholder'=>'Nombre del cliente','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('apellidopat','Apellido Paterno') !!}
            {!! Form::text('apellidopat',null,['class' => 'form-control','placeholder'=>'Apellido paterno del cliente','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('apellidomat','Apellido Materno') !!}
            {!! Form::text('apellidomat',null,['class' => 'form-control','placeholder'=>'Apellido materno del cliente','maxlength'=>'80', 'required']) !!}
            
        </div>


        <div class="form-group">
        
            {!! Form::label('celular','Celular') !!}
            {!! Form::text('celularcont',null,['class' => 'form-control','placeholder'=>'Numero de celular','maxlength'=>'9', 'required']) !!}
            
        </div>

        <div class="form-group">
        
                {!! Form::label('operador','Operador') !!}
                {!! Form::select('operador',['0'=>'Seleccione una opción','Movistar'=>'Movistar','Claro'=>'Claro','Bitel'=>'Bitel','Entel'=>'Entel'],null,['class' => 'form-control select-tag', 'required']) !!}
                
        </div>

        <div class="form-group">
        
            {!! Form::label('email','Email') !!}
            {!! Form::text('email',null,['class' => 'form-control','placeholder'=>'Ejm:asd@asd.com','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::label('descripcion','Descripcion') !!}
            {!! Form::text('descripcion',null,['class' => 'form-control','placeholder'=>'Descripcion','maxlength'=>'250']) !!}
            
        </div>

       

        <div class="form-group">
        
            {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
        
        </div>

{!! Form::close() !!}

@endsection