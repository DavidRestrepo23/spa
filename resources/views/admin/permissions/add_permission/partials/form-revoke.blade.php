{{csrf_field()}}
<div class="row">
    <div class="col-md-4">
        <div class="form-group ">
            {{Form::label('role_permission', 'Seleccione los permisos para revocar', ['style' => 'color:black'])}}
            <hr>
            @foreach($role_has_permission as $role_permission)
                    <label style="font-size: 12pt;color:black;">
                        {{Form::checkbox('role_permission[]', $role_permission->name, null,  ['class' => 'check'])}} {{$role_permission->description}} <br>
                    </label>
            @endforeach
            <hr>
            {!! $errors->first('permissions', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group ">
                    @can('destroy.permissions')
                    {{Form::button('<i  class="fas fa-exclamation-triangle icon"></i> Revocar permisos', ['class' => 'btn btn-danger', 'type' => 'submit'] )}}
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>





