@extends('admin.layouts.app')
@section('content')

<a href="{{ route('ventas.create') }}" class="btn btn-primary">Registrar nuevo</a>

    @include('admin.venta.buscar')

    <br>

    <h3>Listado de Ventas</h3>

    <div class="table table-bordered table-responsive">
        <table class="table">
            <thead>
                <th>Id</th>
                <th>Codigo</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Empresa proveedora</th>
                <th>Trabajador</th>
                <th>Estado</th>
                <th>Descripcion</th>

                <th>Acciones</th>
            </thead>
            <tbody>

            @foreach($ventas as $venta)
            <tr>
                <td>{{ $venta->id }}</td>
                <td>{{ $venta->codigo }}</td>
                <td>{{ $venta->fechaventa }}</td>
                <td>{{ $venta->totalventa }}</td>
                <td>{{ $venta->cliente->nombre }}</td>
                <td>{{ $venta->user->nombre }} {{ $venta->user->apellidopat }} {{ $venta->user->apellidomat }}</td>
                <td>{{ $venta->estado }}</td>
                <td>{{ $venta->descripcion }}</td>
                
                <td>
                    <div style="display:inline">
                        <a href="{{ route('ventas.edit',$venta->id)}}" class="btn btn-danger">Editar</a>
                        @include('admin.venta.delete',['venta' => $venta])
                    </div>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{!! $ventas->links() !!}


</div>

@endsection