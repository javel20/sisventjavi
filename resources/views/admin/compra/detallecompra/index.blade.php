@extends('admin.layouts.app')
@section('content')

    <br>

    <h3>Listado de Detalle Compras</h3>

    <div class="table table-bordered table-responsive">
        <table class="table">
            <thead>
                <th>Id</th>
                <th>presentacion</th>
                <th>Cantidad</th>
                <th>Fecha vencimiento</th>
                <th>Costo unitario</th>
                <th>Costo Total</th>
                <th>Descripcion</th>
                <th>Acciones</th>
            </thead>
            <tbody>

            @foreach($detalle_compras as $detalle_compra)
            <tr>
                <td>{{ $detalle_compra->id }}</td>
                <td>{{ $detalle_compra->stockpresent->nombre }}</td>
                <td>{{ $detalle_compra->cantidad }}</td>
                <td>{{ $detalle_compra->fechavenc }}</td>
                <td>{{ $detalle_compra->costounitario }}</td>
                <td>{{ $detalle_compra->costototal }}</td>
                <td>{{ $detalle_compra->descripcion }}</td>
                
                {{--<td>
                    <div style="display:inline">
                   
                        @include('admin.detallecompra.delete',['detalle_compra' => $detalle_compra])
                    </div>

                </td>--}}
            </tr>
        @endforeach
    </tbody>
</table>


</div>

@endsection