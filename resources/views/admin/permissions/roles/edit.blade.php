@extends('layouts.admin')
@section('content')
	
	    <div class="col-md-8">
	        <div class="card">
	            <div class="card-header">
	                <h5 class="title">Editar Rol</h5>
	            </div>
	            <div class="card-body">
	              	{!! Form::model($rol, ['route' => ['roles.update', $rol->id] , 'method' => 'PUT' ]) !!}
	              		  @include('admin.permissions.roles.partials.form')
	              	{!! Form::close()!!}
	              	<br>
	              	
	            </div>
	        </div>
	    </div>

@endsection