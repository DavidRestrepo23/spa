{{csrf_field()}}
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{Form::label('password_current', 'Contraseña actual', ['style' => 'color:black'])}}
            {{Form::password('password_current', ['class' => 'form-control', 'style' => 'font-size:14pt;'])}}
            {!! $errors->first('password_current', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<br><br>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{Form::label('password', 'Nueva contraseña', ['style' => 'color:black'])}}
            {{Form::password('password', ['class' => 'form-control', 'style' => 'font-size:14pt;'])}}
            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{Form::label('password_confirmation', 'Repetir contraseña', ['style' => 'color:black'])}}
            {{Form::password('password_confirmation', ['class' => 'form-control', 'style' => 'font-size:14pt;'])}}
            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<br><br>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {{Form::label('status', 'Desactivar mi cuenta', ['style' => 'color:black'])}}
            {{Form::select('status', ['active' => 'Activa', 'inactive' => 'Desactivar cuenta'] , auth()->user()->status , ['class' => 'form-control input-disabled', 'disabled' => 'disabled'])}}
            {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
     <div class="col-md-4">
        <div class="form-group">
            <button type="button" class="btn btn-danger btn-desactive" style="margin-top: 20px;"><i class="fas fa-exclamation-triangle"></i> Quiero desactivar mi cuenta</button>
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

