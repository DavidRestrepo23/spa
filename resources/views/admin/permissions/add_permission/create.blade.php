@extends('layouts.admin')
@section('content')
	
	    <div class="col-md-8">
	        <div class="card">
	            <div class="card-header">
	                <h5 class="title">Asignar Permisos</h5>
	            </div>
	            <div class="card-body">
	              	{!! Form::open(['route' => 'permissions.store' ,'method' => 'POST' ]) !!}
	              		  @include('admin.permissions.add_permission.partials.form')
	              	{!! Form::close()!!}
	              	<br>
	              	
	            </div>
	        </div>
	    </div>

@endsection