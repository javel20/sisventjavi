@extends('admin.layouts.app')
@section('content')

<a href="{{ route('productos.create') }}" class="btn btn-primary">Registrar nuevo</a>

    @include('admin.producto.buscar')

    <br>

    <h3>Listado de productos</h3>

    <div class="table table-bordered table-responsive">
        <table class="table">
            <thead>
                <th>Id</th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Imagen</th>
                <th>Estado</th>
                <th>Descripcion</th>

                <th>Acciones</th>
            </thead>
            <tbody>

                @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->codigo }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->categoria->nombre }}</td>
                        <td><img src="{{ asset('images/productos/'.$producto->imagen) }}" alt="{{ $producto->nombre }}" height="100px" width="100px" class="img-thumbnail"></td>
                        <td>{{ $producto->estado }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        
                        <td>
                            <div>
                                <a href="{{ route('productos.edit',$producto->id)}}" class="btn btn-danger">Editar</a>
                                @include('admin.producto.delete',['producto' => $producto])
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $productos->links() !!}

</div>

@endsection