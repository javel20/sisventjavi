@extends('admin.layouts.app')
@section('content')

<a href="{{ route('accesos.create') }}" class="btn btn-primary">Registrar nuevo</a>

    @include('admin.acceso.buscar')

    <br>

    <h3>Listado de accesos</h3>

    <div class="table table-bordered table-responsive">
        <table class="table">
            <thead>
                <th>Id</th>
                <th>Nombre</th>


                <th>Acciones</th>
            </thead>
            <tbody>

                @foreach($accesos as $acceso)
                    <tr>
                        <td>{{ $acceso->id }}</td>
                        <td>{{ $acceso->nombre }}</td>

                        
                        <td>

                                <a href="{{ route('accesos.edit',$acceso->id)}}" class="btn btn-danger">Editar</a>
                                @include('admin.acceso.delete',['acceso' => $acceso])

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $accesos->links() !!}

</div>

@endsection