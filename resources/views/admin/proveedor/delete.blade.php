{!! Form::open(['route' => ['proveedor.destroy',$proveedor], 'method' => 'DELETE', 'class' => 'inline-block' ]) !!}

    <button type="submit" class="btn btn-danger" value="Eliminar" onclick="return confirm('¿Está seguro que desea eliminar?')">Eliminar</button>

{!! Form::close() !!}