{{csrf_field()}}

<div class="row">
    <div class="col-md-4">
        <div class="form-group ">
            {{Form::label('name', 'Nombre', ['style' => 'color:black'])}}
            {{Form::text('name', null, ['class' => 'form-control'] )}}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}

        </div>
    </div>
    <div class="row">
    <div class="col-md-12">
        <div class="form-group ">
            {{Form::button('<i class="fas fa-save"></i> Guardar', ['class' => 'btn btn-success', 'type' => 'submit', 'style' => 'float:right;margin-top:25px;'] )}}
        </div>
    </div>
</div>
</div>
<br>



