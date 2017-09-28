

{!! Form::open(['route' => 'locals.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}

        <div class="input-group" >
            {!! Form::text('buscar', null, ['class' => 'form-control','placeholder' => 'Buscar','aria-describedby'=>'search']) !!}
            <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
        </div>
    {!! form::close() !!}