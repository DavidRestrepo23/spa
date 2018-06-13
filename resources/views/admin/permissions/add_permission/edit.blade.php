@extends('layouts.admin')
@section('content')
	
	    <div class="col-md-6">
	        <div class="card">
	            <div class="card-header">
	                <h5 class="title">Asignar Permisos para <span style="color:#fa7a50"> {{$role->name}} </span> </h5>
	            </div>
	            <div class="card-body">
	              	{!! Form::model($permission, ['route' => ['permissions.update', $permission->id] ,'method' => 'PUT' ]) !!}
	              		  @include('admin.permissions.add_permission.partials.form')
	              	{!! Form::close()!!}
	              	<br>
	              	
	            </div>
	        </div>
	    </div>
	    <div class="col-md-6">
	        <div class="card">
	            <div class="card-header">
	                <h5 class="title">Permisos Asignados para <span style="color:#fa7a50"> {{$role->name}} </span> </h5>
	            </div>
	            <div class="card-body">
	              	{{ Form::open(['route' => ['permissions.destroy', $permission->id] , 'method' => 'DELETE', 'class' => 'form-revoke'])}}
	              		  @include('admin.permissions.add_permission.partials.form-revoke')
	              	{{Form::close()}}
	              	<br>
	              	
	            </div>
	        </div>
	    </div>
@endsection