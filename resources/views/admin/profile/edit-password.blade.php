@extends('layouts.admin')
@section('content')
	
	    <div class="col-md-8">
	        <div class="card">
	            <div class="card-header">
	                <h5 class="title">Seguridad</h5>
	            </div>
	            <div class="card-body">
	              	{!! Form::open(['route' => ['security.update', auth()->user()->id] ,'method' => 'PUT', 'files' => true]) !!}
	              		  @include('admin.profile.partials.form-security')
	              	{!! Form::close()!!}
	              	<div class="row" style="margin-top: 30px;padding: 20px;">
	              		<div class="col-xs-12">
	              			<span style="color:orange;"><b>Nota:</b> Si desactivas la cuenta no podras volver a acceder a ella,<br>  para ello deberas contactar al administrador del <b>blog</b></span>
	              		</div>
	              	</div>
	            </div>

	        </div>
	    </div>
@endsection