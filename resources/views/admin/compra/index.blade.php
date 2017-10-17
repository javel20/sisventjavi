@extends('admin.layouts.app')
@section('content')

<a href="{{ route('compras.create') }}" class="btn btn-primary">Registrar nuevo</a>

    @include('admin.compra.buscar')

    <br>

    <h3>Listado de Compras</h3>

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

            @foreach($compras as $compra)
            <tr>
                <td>{{ $compra->id }}</td>
                <td>{{ $compra->codigo }}</td>
                <td>{{ $compra->fechacompra }}</td>
                <td>{{ $compra->totalcompra }}</td>
                <td>{{ $compra->proveedor->nombre_empresa }}</td>
                <td>{{ $compra->trabajador->nombre }} {{ $compra->trabajador->apellidopat }} {{ $compra->trabajador->apellidomat }}</td>
                <td>{{ $compra->estado }}</td>
                <td>{{ $compra->descripcion }}</td>
                
                <td>
                    <div style="display:inline">
                        <a href="{{ route('compras.edit',$compra->id)}}" class="btn btn-danger">Editar</a>
                        @include('admin.compra.delete',['compra' => $compra])
                    </div>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{!! $compras->links() !!}


</div>

@endsection