@extends('admin.layouts.app')
@section('content')

<a href="{{ route('tipotrabajador.create') }}" class="btn btn-primary">Registrar nuevo</a>

    @include('admin.tipotrabajador.buscar')

    <br>

    <h3>Listado de tipo de trabajadores</h3>

    <div class="table table-bordered table-responsive">
        <table class="table">
            <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>


                <th>Acciones</th>
            </thead>
            <tbody>

                @foreach($tipotrabs as $tipotrab)
                    <tr>
                        <td>{{ $tipotrab->id }}</td>
                        <td>{{ $tipotrab->nombre }}</td>
                        <td>{{ $tipotrab->descripcion }}</td>

                        
                        <td>

                                <a href="{{ route('tipotrabajador.edit',$tipotrab->id)}}" class="btn btn-danger">Editar</a>
                                @include('admin.tipotrabajador.delete',['tipotrab' => $tipotrab])

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $tipotrabs->links() !!}

</div>

@endsection