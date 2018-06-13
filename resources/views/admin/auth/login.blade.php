@extends('layouts.app')

@section('content')
	@if(session('flash'))
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<div class="alert alert-danger">
					{{session('flash')}}
				</div>
			</div>
		</div>
	@endif
	<div class="row" style="margin-top: 10%;">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="panel-title">Blog la quinta agencia</h1>
				</div>
				<div class="panel-body">
					{!! Form::open(['route' => 'login' ,'method' => 'POST']) !!}
						@include('admin.auth.partials.formLogin')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection