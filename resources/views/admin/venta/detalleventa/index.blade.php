@extends('admin.layouts.app')
@section('content')

    <br>

    <h3>Listado de detalle ventas</h3>

    <div class="table table-bordered table-responsive">
        <table class="table">
            <thead>
                <th>Id</th>
                <th>presentacion</th>
                <th>Cantidad</th>
                <th>Precio unitario</th>
                <th>Precio Total</th>
                <th>Descripcion</th>
                <th>Acciones</th>
            </thead>
            <tbody>

            @foreach($detalle_ventas as $detalle_venta)
            <tr>
                <td>{{ $detalle_venta->id }}</td>
                <td>{{ $detalle_venta->stockpresent->nombre }}</td>
                <td>{{ $detalle_venta->cantidad }}</td>
                <td>{{ $detalle_venta->preciounitario }}</td>
                <td>{{ $detalle_venta->preciototal }}</td>
                <td>{{ $detalle_venta->descripcion }}</td>
                
                {{--<td>
                    <div style="display:inline">
                   
                        @include('admin.detalleventa.delete',['detalle_venta' => $detalle_venta])
                    </div>

                </td>--}}
            </tr>
        @endforeach
    </tbody>
</table>


</div>

@endsection