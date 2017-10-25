@extends('admin.layouts.app')
@section('content')

<a href="{{ route('proveedor.create') }}" class="btn btn-primary">Registrar nuevo</a>

    @include('admin.proveedor.buscar')

    <br>

    <h3>Listado de Proveedores</h3>

    <div class="table table-bordered table-responsive">
        <table class="table">
            <thead>
                <th>Id</th>
                <th>RUC</th>
                <th>Nombre Empresa</th>
                <th>Direccion</th>
                <th>Nombre Contacto</th>
                <th>Apellido paterno</th>
                <th>Apellido materno</th>
                <th>Celular</th>
                <th>Operador</th>
                <th>Email</th>
                <th>Estado</th>
                <th>Descripcion</th>

                <th>Acciones</th>
            </thead>
            <tbody>

                @foreach($proveedors as $proveedor)
                    <tr>
                        <td>{{ $proveedor->id }}</td>
                        <td>{{ $proveedor->RUC}}</td>
                        <td>{{ $proveedor->nombre_empresa }}</td>
                        <td>{{ $proveedor->direccion }}</td>
                        <td>{{ $proveedor->nombre_contacto }}</td>
                        <td>{{ $proveedor->apellidopat }}</td>
                        <td>{{ $proveedor->apellidomat }}</td>
                        <td>{{ $proveedor->celular_contacto }}</td>
                        <td>{{ $proveedor->operador }}</td>
                        <td>{{ $proveedor->email }}</td>
                        <td>{{ $proveedor->estado }}</td>
                        <td>{{ $proveedor->descripcion }}</td>

                        
                        <td>

                                <a href="{{ route('proveedor.edit',$proveedor->id)}}" class="btn btn-danger">Editar</a>
                                @include('admin.proveedor.delete',['proveedor' => $proveedor])

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $proveedors->links() !!}

</div>

@endsection