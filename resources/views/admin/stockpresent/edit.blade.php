@extends('admin.layouts.app')
@section('content')

{!! Form::open(['route' => ['stockpresent.update',$stockpresent], 'method' => 'PUT']) !!}

<h3>Editar Stock-Presentacion</h3>

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
            {!! Form::text('nombre',$stockpresent->nombre,['class' => 'form-control','placeholder'=>'Nombre de la presentacion','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('stockminimo','Stock minimo') !!}
            {!! Form::text('stockmin',$stockpresent->stockmin,['class' => 'form-control','placeholder'=>'ingrese stock minimo','maxlength'=>'8', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('stockreal','Stock real') !!}
            {!! Form::text('stockreal',$stockpresent->stockreal,['class' => 'form-control','placeholder'=>'ingrese stock real','maxlength'=>'8', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('precio','Precio Compra') !!}
            {!! Form::text('precio',$stockpresent->precio,['class' => 'form-control','placeholder'=>'Precio venta','maxlength'=>'9', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('porc_ganancia','Porcentaje de ganancia') !!}
            {!! Form::text('porc_ganancia',$stockpresent->porc_ganancia,['class' => 'form-control','placeholder'=>'%','maxlength'=>'100', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('precioventa','Precio Venta') !!}
            {!! Form::text('precioventa',$stockpresent->precioventa,['class' => 'form-control','readonly'=>'readonly','placeholder'=>'Precio venta','maxlength'=>'9', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('ganancia','Ganancia') !!}
            {!! Form::text('ganancia',$stockpresent->ganancia,['class' => 'form-control','readonly'=>'readonly','placeholder'=>'Precio venta','maxlength'=>'9', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
                {!! Form::label('estado','Estado') !!}
                {!! Form::select('estado',['0'=>'Seleccione una opción','Activo'=>'Activo','Inactivo'=>'Inactivo'],$stockpresent->estado,['class' => 'form-control select-tag', 'required']) !!}
                
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('descripcion','Descripcion') !!}
            {!! Form::text('descripcion',$stockpresent->descripcion,['class' => 'form-control','placeholder'=>'Descripcion','maxlength'=>'250']) !!}
            
        </div>


        <div class="form-group col-md-6">

            {!! Form::label('prod','Producto') !!}
            {!! Form::select('producto',$productos,$stockpresent->producto->id,['class' => 'form-control select-tag', 'required']) !!}
            
        </div>

       
        <div class="form-group col-md-12">
        
            {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
        
        </div>

@push('scripts')
    <script>

    $("#precio").on("change", function(event){//changue evento para seleccionar una opcion
        $("#porc_ganancia").val("");
        $("#precioventa").val("");
        $("#ganancia").val("");
    })
    
    $("#porc_ganancia").on("change", function(event){//changue evento para seleccionar una opcion

        precio=$("#precio").val();
        precioventa=$("#precioventa").val();
        porc_ganancia=$("#porc_ganancia").val();
        ganancia=$("#ganancia").val();
        console.log(precio);

        //if(precio != "" && porc_ganancia != "" && precioventa != ""){

        precioventa=((Number(precio)*(Number(porc_ganancia))/100)+Number(precio));
        console.log(precioventa);
        $("#precioventa").val(precioventa);

        ganancia=Number(precioventa-precio);
        $("#ganancia").val(ganancia);
        /* }else{
            alert("LLene bien el formulario");
        } */


        console.log("estoy en por_ganancia")

        $('#precioventa').val(precioventa);

        })


    </script>
@endpush

{!! Form::close() !!}

@endsection