@extends('admin.layouts.app')

@section('title','lista de usuarios')

@section('content')

    <a href="{{ route('users.create') }}" class="btn btn-info">Registrar nuevo</a>

    @include('admin.user.buscar')

    <br>
    <div class="table table-bordered table-responsive">
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Email</th>
                <th>Trabajador</th>
                <th>Estado</th>
                <th>Acciones</th>
            </thead>
            <tbody>

                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->nombre }} {{ $user->apellidopat }} {{ $user->apellidomat }}</td>
                        <td>{{ $user->estado }}</td>
                        <td>
                            @if($user->tipotrabs == "admin")
                                <span class="label label-danger">{{ $user->type }}</span>
                            @else
                                <span class="label label-primary">{{ $user->type }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('users.edit',$user->id)}}" class="btn btn-danger">Editar</a>
                            @include('admin.user.delete',['users' => $users])
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    {!! $users->render() !!}

    </div>

@endsection