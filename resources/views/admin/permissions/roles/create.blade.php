@extends('layouts.admin')
@section('content')
	
	    <div class="col-md-8">
	        <div class="card">
	            <div class="card-header">
	                <h5 class="title">Roles</h5>
	            </div>
	            <div class="card-body">
	              	{!! Form::open(['route' => 'roles.store' ,'method' => 'POST' ]) !!}
	              		  @include('admin.permissions.roles.partials.form')
	              	{!! Form::close()!!}
	              	<br>
	              	
	            </div>
	        </div>
	    </div>

@endsection