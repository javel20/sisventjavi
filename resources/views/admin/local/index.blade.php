@extends('admin.layouts.app')
@section('content')

<a href="{{ route('locals.create') }}" class="btn btn-primary">Registrar nuevo</a>

    @include('admin.local.buscar')

    <br>

    <h3>Listado de locales</h3>

    <div class="table table-bordered table-responsive">
        <table class="table">
            <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Estado</th>

                <th>Acciones</th>
            </thead>
            <tbody>

                @foreach($locals as $local)
                    <tr>
                        <td>{{ $local->id }}</td>
                        <td>{{ $local->nombre }}</td>
                        <td>{{ $local->direccion }}</td>
                        <td>{{ $local->telefono }}</td>
                        <td>{{ $local->estado }}</td>
                        
                        <td>

                                <a href="{{ route('locals.edit',$local->id)}}" class="btn btn-danger">Editar</a>
                                @include('admin.local.delete',['local' => $local])

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $locals->links() !!}

</div>

@endsection