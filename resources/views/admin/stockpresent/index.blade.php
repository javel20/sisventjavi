@extends('admin.layouts.app')
@section('content')

<a href="{{ route('stockpresent.create') }}" class="btn btn-primary">Registrar nuevo</a>

    @include('admin.stockpresent.buscar')

    <br>

    <h3>Listado de Stock-Presentacion</h3>

    <div class="table table-bordered table-responsive">
        <table class="table">
            <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Stock Real</th>
                <th>Porcentaje de ganancia</th>
                <th>Precio Venta</th>
                <th>Producto</th>
                <th>Estado</th>
                <th>Descripcion</th>

                <th>Acciones</th>
            </thead>
            <tbody>

                @foreach($stockpresents as $stockpresent)
                    <tr>
                        <td>{{ $stockpresent->id }}</td>
                        <td>{{ $stockpresent->nombre }}</td>
                        <td>{{ $stockpresent->stockreal }}</td>
                        <td>{{ $stockpresent->porc_ganancia }}</td>
                        <td>{{ $stockpresent->precioventa }}</td>
                        <td>{{ $stockpresent->producto->nombre }}</td>
                        <td>{{ $stockpresent->estado }}</td>
                        <td>{{ $stockpresent->descripcion }}</td>
                        
                        <td>

                                <a href="{{ route('stockpresent.edit',$stockpresent->id)}}" class="btn btn-danger">Editar</a>
                                @include('admin.stockpresent.delete',['stockpresent' => $stockpresent])

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $stockpresents->links() !!}

</div>

@endsection