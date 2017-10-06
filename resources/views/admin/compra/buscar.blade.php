{!! Form::open(['route' => 'compras.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}

        <div class="input-group" >
            {!! Form::text('buscar', null, ['class' => 'form-control','placeholder' => 'Buscar','aria-describedby'=>'search']) !!}
            
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            </span>

        </div>
{!! form::close() !!}