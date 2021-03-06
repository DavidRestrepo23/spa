{{csrf_field()}}

<div class="row">
    <div class="col-md-4">
        <div class="form-group ">
            {{Form::label('name', 'Nombre', ['style' => 'color:black'])}}
            {{Form::text('name', null, ['class' => 'form-control'] )}}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}

        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{Form::label('lastname', 'Apellido', ['style' => 'color:black'])}}
            {{Form::text('lastname', null, ['class' => 'form-control'] )}}
            {!! $errors->first('lastname', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{Form::label('gender', 'Genero', ['style' => 'color:black'])}}
            {{Form::select('gender', ['male' => 'Masculino', 'female' => 'Femenino', 'other' => 'Otro'] , null , ['class' => 'form-control'])}}
            {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}

        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {{Form::label('email', 'Correo electrónico', ['style' => 'color:black'])}}
            {{Form::text('email', null, ['class' => 'form-control'] )}}
            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{Form::label('role', 'Rol', ['style' => 'color:black'])}}
            {{Form::select('role', $roles , null , ['class' => 'form-control'])}}
            {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group ">
            {{Form::button('<i class="fas fa-save"></i> Crear usuario', ['class' => 'btn btn-success', 'type' => 'submit', 'style' => 'float:right'] )}}
        </div>
    </div>
</div>

