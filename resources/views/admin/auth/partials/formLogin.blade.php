{{ csrf_field() }}
<div class="form-group" {!! $errors->has('email') ? 'has-error' : '' !!} >
	{{Form::label('email', 'Email')}}
	{{Form::text('email', old('email'), ['class' => 'form-control'])}}
	{!! $errors->first('email', '<span style="color:red" class="help-block">:message</span>') !!}
</div>
<div class="form-group" {!! $errors->has('password') ? 'has-error' : '' !!} >
	{{Form::label('password', 'Contraseña')}}
	{{ Form::password('password', ['class' => 'form-control']) }}
	{!! $errors->first('password', '<span style="color:red" class="help-block">:message</span>') !!}
</div>
<div class="form-group">
	{{ Form::button('Ingresar', [ 'type' => 'submit', 'class' => 'btn btn-primary btn-block']) }}
</div>