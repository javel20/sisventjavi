@extends('admin.layouts.app')
@section('content')

{!! Form::open(['route' => ['compras.store'], 'method' => 'POST']) !!}

<h3>Crear nueva compra</h3>

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
            {!! Form::text('codigo',null,['class' => 'form-control','placeholder'=>'Codigo de la compra','maxlength'=>'9', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('fechacompra','Fecha') !!}
            {!! Form::text('fechacompra',null,['class' => 'form-control','placeholder'=>'aaaa/mm/dd','maxlength'=>'10', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('totalcompra','Total compra') !!}
            {!! Form::text('totalcompra',null,['readonly'=>'readonly','class' => 'form-control','placeholder'=>'S/. ','maxlength'=>'10', 'required']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('descripcion','Descripcion') !!}
            {!! Form::text('descripcion',null,['class' => 'form-control','placeholder'=>'Descripcion','maxlength'=>'250']) !!}
            
        </div>

        <div class="form-group col-md-6">
        
            {!! Form::label('proveedor','Empresa proveedora') !!}
            {!! Form::select('proveedor',$proveedors,null ,['class' => 'form-control select-tag', 'required']) !!}
            
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
        
                            {!! Form::label('fechaven','Fecha Vencimiento') !!}
                            {!! Form::text('fechaven',null,['class' => 'form-control','placeholder'=>'aaaa/mm/dd','maxlength'=>'10']) !!}
                            
                        </div>

                        <div class="form-group col-md-6">
                        
                            {!! Form::label('costounitario','Costo Unitario') !!}
                            {!! Form::text('costounitario',null,['class' => 'form-control','readonly'=>'readonly','placeholder'=>'S/. ','maxlength'=>'10']) !!}
                            
                        </div>

                        <div class="form-group col-md-6" style="display:none">
                        
                            {!! Form::label('costototal','Sub Total') !!}
                            {!! Form::text('costototal',null,['class' => 'form-control','placeholder'=>'S/. ','maxlength'=>'12']) !!}
                            
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
                                        <th>Fecha Vencimiento</th>
                                        <th>Costo Unitario</th>
                                        <th>SubTotal</th>

                                    
                                    </thead>
                                    <tfood>
                                        <th>TOTAL</th>
                                        <th></th>
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

        $("#stockpresent").on("change", function(event){//changue evento para seleccionar una opcion
        console.log("estoy en stockpresent")
        // var option = $(e).find('option:selected');
        //   console.log(e.target.value);
        //   console.log(option);
            
        //traigo el precioventa
        event.target.childNodes.forEach(function(e){ //event.target haciendo click en uno trae los select y con el chilNodes trae los option, foreach recorro a todos los elementos del array, function(e) recore cada elemento en este caso los option
          if(e.value==event.target.value){ //e.value traigo el atributo value y o igualo al value del evento que estoy seleccionando
            precioventa = e.getAttribute('precioventa');//e.get... traigo el atributo precio y lo asigno a precio
            console.log(precioventa);
          }
        });


        $('#costounitario').val(precioventa);

        })



        $("#producto").change(function(e){
            //console.log(e.target.value);
            $.ajax({
                url:"http://localhost/sisventjavi/public/admin/ajaxstockpresent", 
                data : {
                    'IdProducto' : e.target.value
                },
                success:function(response){

                    let acum = "";
                    response.map(e => {
                        acum += `<option precioventa=`+e.precioventa+` stockreal=`+e.stockreal+` value=${e.id}>${e.nombre} - ${e.stockreal}</option>`    
                    })
                    $("#stockpresent").html(acum);

                },

                error:function(response){
                    console.log(response);
                    
                }


            })

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
        fechaven=$("#fechaven").val();
        costounitario=$("#costounitario").val();
        //costototal=$("#costototal").val();

//15:18
        if(cantidad != "" && stockpresent != "" && fechaven != "" && costounitario != ""){

            costototal[cont]=cantidad*costounitario;
        console.log("costototal"+costototal);
            total=Number(total)+Number(costototal[cont]);
            $("#totalcompra").val(total);
        console.log(Number("total"+total));
            var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">Supr</button></td><td><input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidad+'</td><td><input type="hidden" name="producto[]" value="'+producto+'">'+producto+'</td><td><input type="hidden" name="stockpresent[]" value="'+stockpresent+'">'+stockpresent+'</td><td><input type="hidden" name="fechaven[]" value="'+fechaven+'">'+fechaven+'</td><td><input type="hidden" name="costounitario[]" value="'+costounitario+'">'+costounitario+'</td><td><input type="hidden" name="costototal[]" value="'+costototal[cont]+'">'+costototal[cont]+'</td></tr>';
        console.log("fv"+fechaven);
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
            $("#fechaven").val("");
            $("#costounitario").val("");
            $("#fechaven").val("");
            $("#costototal").val("");

        }

        function evaluar(){
            if(total>0){
                $("#guardar").show();
            }else{
                $("#guardar").hide();
            }
        }

        function eliminar(index){   
            console.log("ct"+costototal);
            total=total-costototal[index];
            console.log("total"+total);
            $("#total").html("S/." +total);
            $("#totalcompra").val(total);
            $("#fila" +index).remove();
            evaluar();
        }

    </script>
@endpush

@endsection