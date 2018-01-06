@extends('admin.layouts.app')
@section('content')

{!! Form::open(['route' => ['stockpresent.store'], 'method' => 'POST']) !!}

<h3>Crear nuevo stock-presentacion</h3>

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
        
            {!! Form::label('nombre','Nombre de la presentación') !!}
            {!! Form::text('nombre',null,['class' => 'form-control','placeholder'=>'Nombre de la presentación','maxlength'=>'80', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('stockminimo','Stock minimo') !!}
            {!! Form::text('stockmin',null,['class' => 'form-control','placeholder'=>'ingrese stock minimo','maxlength'=>'8', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('stockreal','Stock real') !!}
            {!! Form::text('stockreal',null,['class' => 'form-control','placeholder'=>'ingrese stock real','maxlength'=>'8', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('precio','Precio Compra') !!}
            {!! Form::text('precio',null,['class' => 'form-control','placeholder'=>'Precio compra','maxlength'=>'9', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('porc_ganancia','Porcentaje de ganancia') !!}
            {!! Form::text('porc_ganancia',null,['class' => 'form-control','placeholder'=>'%','maxlength'=>'100', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('precioventa','Precio Venta') !!}
            {!! Form::text('precioventa',null,['class' => 'form-control','readonly'=>'readonly','placeholder'=>'Precio venta','maxlength'=>'20', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('ganancia','Ganancia') !!}
            {!! Form::text('ganancia',null,['class' => 'form-control','readonly'=>'readonly','placeholder'=>'Ganancia','maxlength'=>'9', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('descripcion','Descripcion') !!}
            {!! Form::text('descripcion',null,['class' => 'form-control','placeholder'=>'Descripcion','maxlength'=>'250']) !!}
            
        </div>


        <div class="form-group col-md-6">

            {!! Form::label('prod','Producto') !!}
            {!! Form::select('producto',$productos,null ,['class' => 'form-control select-tag', 'required']) !!}
            
        </div>

       <br>
        <div class="form-group col-md-12">
        
            {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
        
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

        precioventa=((Number(precio)*(Number(porc_ganancia))/100)+Number(precio)).toFixed(2);
        console.log(precioventa);
        $("#precioventa").val(precioventa);

        ganancia=Number(precioventa-precio).toFixed(2);
        console.log("ganancia"+ganancia);

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