@extends('admin.layouts.app')
@section('content')

<a href="{{ route('trabajadors.create') }}" class="btn btn-primary">Registrar nuevo</a>

    @include('admin.trabajador.buscar')

    <br>

    <h3>Listado de trabajadores</h3>

    <div class="table table-bordered table-responsive">
        <table class="table">
            <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>DNI</th>
                <th>Direccion</th>
                <th>Celular</th>
                <th>Operador</th>
                <th>Tipo Trabajador</th>
                <th>Local</th>
                <th>Estado</th>
                <th>Descripcion</th>

                <th>Acciones</th>
            </thead>
            <tbody>

                @foreach($trabajadors as $trabajador)
                    <tr>
                        <td>{{ $trabajador->id }}</td>
                        <td>{{ $trabajador->nombre }}</td>
                        <td>{{ $trabajador->apellidopat }}</td>
                        <td>{{ $trabajador->apellidomat }}</td>
                        <td>{{ $trabajador->DNI }}</td>
                        <td>{{ $trabajador->direccion }}</td>
                        <td>{{ $trabajador->celular }}</td>
                        <td>{{ $trabajador->operador }}</td>
                        <td>{{ $trabajador->tipotrabajador->nombre }}</td>
                        <td>{{ $trabajador->local->nombre }}</td>
                        <td>{{ $trabajador->estado }}</td>
                        <td>{{ $trabajador->descripcion }}</td>
                        
                        <td>

                                <a href="{{ route('trabajadors.edit',$trabajador->id)}}" class="btn btn-danger">Editar</a>
                                @include('admin.trabajador.delete',['trabajador' => $trabajador])

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $trabajadors->links() !!}

</div>

@endsection