@extends('admin.layouts.app')
@section('content')

<a href="{{ route('categorias.create') }}" class="btn btn-primary">Registrar nuevo</a>

    @include('admin.categoria.buscar')

    <br>

    <h3>Listado de categorias</h3>

    <div class="table table-bordered table-responsive">
        <table class="table">
            <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Estado</th>

                <th>Acciones</th>
            </thead>
            <tbody>

                @foreach($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>{{ $categoria->descripcion }}</td>
                        <td>{{ $categoria->estado }}</td>
                        
                        <td>

                                <a href="{{ route('categorias.edit',$categoria->id)}}" class="btn btn-danger">Editar</a>
                                @include('admin.categoria.delete',['categoria' => $categoria])

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $categorias->links() !!}

</div>

@endsection