@extends('admin.layouts.app')
@section('content')

<a href="{{ route('licencias.create') }}" class="btn btn-primary">Registrar nuevo</a>

    @include('admin.licencia.buscar')

    <br>

    <h3>Listado de licencias</h3>

    <div class="table table-bordered table-responsive">
        <table class="table">
            <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Fecha Inicial</th>
                <th>Fecha Final</th>
                <th>Trabajador</th>
                <th>Estado</th>
                <th>Descripcion</th>

                <th>Acciones</th>
            </thead>
            <tbody>

                @foreach($licencias as $licencia)
                    <tr>
                        <td>{{ $licencia->id }}</td>
                        <td>{{ $licencia->nombre }}</td>
                        <td>{{ $licencia->fechai }}</td>
                        <td>{{ $licencia->fechaf }}</td>
                        <td>{{ $licencia->trabajador->nombre }}</td>
                        <td>{{ $licencia->estado }}</td>
                        <td>{{ $licencia->descripcion }}</td>
                        
                        <td>

                                <a href="{{ route('licencias.edit',$licencia->id)}}" class="btn btn-danger">Editar</a>
                                @include('admin.licencia.delete',['licencia' => $licencia])

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $licencias->links() !!}

</div>

@endsection