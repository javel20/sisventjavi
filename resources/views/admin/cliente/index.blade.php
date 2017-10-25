@extends('admin.layouts.app')
@section('content')

<a href="{{ route('clientes.create') }}" class="btn btn-primary">Registrar nuevo</a>

    @include('admin.cliente.buscar')

    <br>

    <h3>Listado de clientes</h3>

    <div class="table table-bordered table-responsive">
        <table class="table">
            <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido paterno</th>
                <th>Apellido materno</th>
                <th>DNI/RUC</th>
                <th>Direccion</th>
                <th>Celular</th>
                <th>Operador</th>
                <th>Email</th>
                <th>Estado</th>
                <th>Descripcion</th>

                <th>Acciones</th>
            </thead>
            <tbody>

                @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->apellidopat }}</td>
                        <td>{{ $cliente->apellidomat }}</td>
                        <td>{{ $cliente->DNI }} {{$cliente->RUC}}</td>
                        <td>{{ $cliente->direccion }}</td>
                        <td>{{ $cliente->celular }}</td>
                        <td>{{ $cliente->operador }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->estado }}</td>
                        <td>{{ $cliente->descripcion }}</td>

                        
                        <td>

                                <a href="{{ route('clientes.edit',$cliente->id)}}" class="btn btn-danger">Editar</a>
                                @include('admin.cliente.delete',['cliente' => $cliente])

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $clientes->links() !!}

</div>

@endsection