{{Form::open(['route' => ['roles.destroy', $rol->id] , 'method' => 'DELETE', 'class' => 'form-delete'])}}
	{{csrf_field()}}
	<button type="submit" class="btn btn-danger" style="background-color: white;">
		<i style="color:#ff3636; font-size: 15pt;" id="icon" class="fas fa-times"></i>
	</button>
{{Form::close()}}