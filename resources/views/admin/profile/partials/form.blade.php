{{csrf_field()}}

<div class="row">
    <div class="col-md-4">
        <div class="form-group ">
            {{Form::label('name', 'Nombre', ['style' => 'color:black'])}}
            {{Form::text('name', auth()->user()->name, ['class' => 'form-control'] )}}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}

        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{Form::label('lastname', 'Apellido', ['style' => 'color:black'])}}
            {{Form::text('lastname', auth()->user()->lastname, ['class' => 'form-control'] )}}
            {!! $errors->first('lastname', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{Form::label('gender', 'Genero', ['style' => 'color:black'])}}
            {{Form::select('gender', ['male' => 'Masculino', 'female' => 'Femenino', 'other' => 'Otro'] , auth()->user()->gender , ['class' => 'form-control'])}}
            {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}

        </div>
    </div>
</div>
<br><br>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {{Form::label('nickname', 'Apodo', ['style' => 'color:black'])}}
            {{Form::text('nickname', auth()->user()->nickname, ['class' => 'form-control'] )}}
            {!! $errors->first('nickname', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{Form::label('url_facebook', 'Facebook (URL)', ['style' => 'color:black'])}}
            {{Form::text('url_facebook', auth()->user()->url_facebook, ['class' => 'form-control'] )}}
            {!! $errors->first('url_facebook', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{Form::label('url_instagram', 'Instagram (URL)', ['style' => 'color:black'])}}
            {{Form::text('url_instagram', auth()->user()->url_instagram, ['class' => 'form-control'] )}}
            {!! $errors->first('url_instagram', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<br><br>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{Form::label('avatar', 'Avatar (Foto de perfil)', ['style' => 'color:black'])}}
            {{Form::file('avatar',  ['class' => 'form-control', 'accept' => ' .gif, .jpg, .jpeg, .png'])}}
            {!! $errors->first('avatar', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{Form::label('email', 'Correo electrónico', ['style' => 'color:black'])}}
            {{Form::text('email', auth()->user()->email, ['class' => 'form-control'] )}}
            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<br><br>
<div class="row">
<div class="col-md-12">
    <div class="form-group">
         {{Form::label('biography', 'Acerca de mi', ['style' => 'color:black'])}}
         {{Form::textarea('biography', auth()->user()->biography, ['class' => 'form-control'] )}}
         {!! $errors->first('biography', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group ">
          
            {{Form::button('<i class="fas fa-edit"></i> Actualizar', ['class' => 'btn btn-primary', 'type' => 'submit', 'style' => 'float:right'] )}}
        </div>
    </div>
</div>

