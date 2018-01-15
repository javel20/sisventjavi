@extends('admin.layouts.app')
@section('content')

{!! Form::open(['route' => ['clientes.store'], 'method' => 'POST']) !!}

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


        <div class="form-group col-md-6">
        
            {!! Form::label('nombre','Nombre') !!}
            {!! Form::text('nombre',null,['class' => 'form-control','placeholder'=>'Nombre del cliente','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('apellidopat','Apellido Paterno') !!}
            {!! Form::text('apellidopat',null,['class' => 'form-control','placeholder'=>'Apellido paterno del cliente','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('apellidomat','Apellido Materno') !!}
            {!! Form::text('apellidomat',null,['class' => 'form-control','placeholder'=>'Apellido materno del cliente','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
              <div class="row">

                <div class="col-md-4 form-group">
                <label>Tipo Doc</label>
                  <select  class="form-control" id="select_doc">
                      <option>DNI</option>
                      <option>RUC</option>
                  </select></div>
                  

                    <div class="col-md-8 form-group" id="dni_espacio">
                      <!--<label>DNI</label>
                      <input validate="number" type="text" class="form-control" name="DNI" maxlength="8" placeholder="DNI">-->

                    </div>
                    <!--<div class="col-md-8 form-group" id="ruc_espacio">-->
                      <!--<label>RUC</label>
                      <input validate="number" type="text" class="form-control" name="RUC" placeholder="RUC">-->

                    <!--</div>-->
            </div>
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('direccion','Direccion') !!}
            {!! Form::text('direccion',null,['class' => 'form-control','placeholder'=>'Direccion','maxlength'=>'80', 'required']) !!}
            
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
        
            {!! Form::label('email','Email') !!}
            {!! Form::text('email',null,['class' => 'form-control','placeholder'=>'Ejm:asd@asd.com','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('descripcion','Descripcion') !!}
            {!! Form::text('descripcion',null,['class' => 'form-control','placeholder'=>'Descripcion','maxlength'=>'250']) !!}
            
        </div>

       

        <div class="form-group col-md-12">
        
            {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
        
        </div>

{!! Form::close() !!}

<script>
  var select_doc = document.getElementById("select_doc");
  // var ruc_espacio = document.getElementById("ruc_espacio");
  var dni_espacio = document.getElementById("dni_espacio");
  dni_espacio.innerHTML=`<label>DNI</label>
                              <input validate="number" type="text" class="form-control" name="DNI" placeholder="DNI" maxlength="8">`
  select_doc.onchange=function(e){
      if(e.target.value == "DNI"){
        dni_espacio.innerHTML=`<label>DNI</label>
                              <input validate="number" type="text" class="form-control" name="DNI" placeholder="DNI" maxlength="8">`
      }else if(e.target.value == "RUC"){
        dni_espacio.innerHTML=`<label>RUC</label>
                              <input validate="number" type="text" class="form-control" name="RUC" placeholder="RUC" maxlength="11">`
      }
   };
</script>

@endsection