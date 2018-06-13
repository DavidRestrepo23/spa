{{csrf_field()}}
<div class="row">
    <div class="col-md-4">
        <div class="form-group ">
            {{Form::label('permission_id', 'Seleccione los permisos', ['style' => 'color:black'])}}
            <hr>
            @foreach($permissions as $permission)
                    <label style="font-size: 12pt;color:black;">
                        {{Form::checkbox('permission[]', $permission->name)}} {{$permission->description}} <br>
                    </label>
            @endforeach
            <hr>
            {!! $errors->first('permissions', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group ">
                    @can('edit.permissions')
                    {{Form::button('<i class="fas fa-save"></i> Guardar', ['class' => 'btn btn-success', 'type' => 'submit'] )}}
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>





