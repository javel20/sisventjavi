@extends('admin.layouts.app')
@section('content')

{!! Form::open(['route' => ['ventas.store'], 'method' => 'POST']) !!}

<h3>Crear nueva venta</h3>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


    <div class="container-fluid">
        <div class="form-group col-md-6">
        
            {!! Form::label('codigo','Codigo') !!}
            {!! Form::text('codigo',null,['class' => 'form-control','placeholder'=>'Codigo de la venta','maxlength'=>'9', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('fechaventa','Fecha') !!}
            {!! Form::text('fechaventa',null,['class' => 'form-control','placeholder'=>'aaaa/mm/dd','maxlength'=>'10', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('totalventa','Total venta') !!}
            {!! Form::text('totalventa',null,['readonly'=>'readonly','class' => 'form-control','placeholder'=>'S/. ','maxlength'=>'10', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('descripcion','Descripcion') !!}
            {!! Form::text('descripcion',null,['class' => 'form-control','placeholder'=>'Descripcion','maxlength'=>'250']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('cliente','Cliente') !!}
            {!! Form::select('cliente',$clientes,null ,['class' => 'form-control select-tag', 'required']) !!}
            
        </div>

       
        </div>
        
        
            <div class="row">
            
                <div class="panel panel-primary">
                    <div class="panel panel-body">

                        <div class="form-group col-md-6">
                        
                            {!! Form::label('producto','Producto') !!}
                            {!! Form::select('producto',$productos,null ,['class' => 'form-control select-tag']) !!}
                            
                        </div>



                        <div class="form-group col-md-6">
        
                            {!! Form::label('stockpresent','Stock-Presentacion') !!}
                            {!! Form::select('stockpresent',$stockpresents,null ,['class' => 'form-control select-tag']) !!}
                            
                        </div>

                        <div class="form-group col-md-6">
                        
                            {!! Form::label('cantidad','Cantidad') !!}
                            {!! Form::text('cantidad',null,['class' => 'form-control','placeholder'=>'#','maxlength'=>'8']) !!}
                            
                        </div>


                        <div class="form-group col-md-6">
                        
                            {!! Form::label('preciounitario','Precio Unitario') !!}
                            {!! Form::text('preciounitario',null,['class' => 'form-control','placeholder'=>'S/. ','maxlength'=>'10']) !!}
                            
                        </div>

                        <div class="form-group col-md-6">
                        
                            {!! Form::label('preciototal','Sub Total') !!}
                            {!! Form::text('preciototal',null,['class' => 'form-control','placeholder'=>'S/. ','maxlength'=>'12']) !!}
                            
                        </div>

                        <div class="form-group col-md-12">
        
                            {!! Form::button('Agregar detalle', ['class' => 'btn btn-primary','id'=>'btn_add']) !!}
                        
                        </div>

                            <div class="col-md-12">
                                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                    <thead style="background-color:#8fb9e0">
                                        <th>Opciones</th>
                                        <th>Cantidad</th>
                                        <th>Producto</th>
                                        <th>Stock-Presentacion</th>
                                        <th>Precio Unitario</th>
                                        <th>SubTotal</th>

                                    
                                    </thead>
                                    <tfood>
                                        <th>TOTAL</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th><h4 id="total">S/. 0.00</h4></th>

                                    <tfood>
                                </table>
                            
                            </div>

                    </div>    
                
                </div>
            
            </div>




        <div class="form-group col-md-12" id="guardar">
            <input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
            {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
        
        </div>

    
    
{!! Form::close() !!}

@push('scripts')
    <script>

    $(document).ready(function(){
        $('#btn_add').click(function(){
            agregar();
        });
    });

    var cont=0;
    total=0;
    subtotal=[];
    $("#guardar").hide();

    function agregar(){

        cantidad=$("#cantidad").val();
        producto=$("#producto option:selected").text();
        stockpresent=$("#stockpresent option:selected").val();
        //fechaven=$("#fechaven").val();
        preciounitario=$("#preciounitario").val();
        //preciototal=$("#preciototal").val();

//15:18
        if(cantidad != "" && stockpresent != "" && preciounitario != ""){

            preciototal[cont]=cantidad*preciounitario;
        console.log("preciototal"+preciototal);
            total=Number(total)+Number(preciototal[cont]);
            $("#totalventa").val(total);
        console.log(Number("total"+total));
            var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">Supr</button></td><td><input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidad+'</td><td><input type="hidden" name="producto[]" value="'+producto+'">'+producto+'</td><td><input type="hidden" name="stockpresent[]" value="'+stockpresent+'">'+stockpresent+'</td>><td><input type="hidden" name="preciounitario[]" value="'+preciounitario+'">'+preciounitario+'</td><td><input type="hidden" name="preciototal[]" value="'+preciototal[cont]+'">'+preciototal[cont]+'</td></tr>';
            cont++;
            limpiar();
            $("#total").html("S/. "+ total);
            evaluar();
            $('#detalles').append(fila);
        }else{
            alert("LLene bien el formulario");
        }

    }

        function limpiar(){
            $("#cantidad").val("");
            $("#preciounitario").val("");
            $("#preciototal").val("");

        }

        function evaluar(){
            if(total>0){
                $("#guardar").show();
            }else{
                $("#guardar").hide();
            }
        }

        function eliminar(index){   
            console.log("ct"+preciototal);
            total=total-preciototal[index];
            console.log("total"+total);
            $("#total").html("S/." +total);
            $("#totalventa").val(total);
            $("#fila" +index).remove();
            evaluar();
        }

    </script>
@endpush

@endsection