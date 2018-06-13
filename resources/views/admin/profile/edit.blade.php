@extends('layouts.admin')
@section('content')
	
	    <div class="col-md-8">
	        <div class="card">
	            <div class="card-header">
	                <h5 class="title">Editar mi perfil</h5>
	            </div>
	            <div class="card-body">
	              	{!! Form::open(['route' => ['profiles.update', auth()->user()->id] ,'method' => 'PUT', 'files' => true]) !!}
	              		  @include('admin.profile.partials.form')
	              	{!! Form::close()!!}
	            </div>
	        </div>
	    </div>
	    <div class="col-md-4">
	        <div class="card card-user">
	            <div class="image">
	                <img src="{{ auth()->user()->gender_banner }}" alt="...">
	            </div>
	            <div class="card-body">
	                <div class="author">
	                    
	                        <img class="avatar border-gray" src="{{ auth()->user()->avatar_image_default }}" alt="...">
	                        <h5 class="title" style="color:#FA7A50">{{ auth()->user()->name." ".auth()->user()->lastname }}</h5>
	                  
	                    <p class="description">
	                        {{auth()->user()->nickname}}
	                    </p>
	                </div>
	              	<p class="description text-center">
	                    {{ auth()->user()->biography }}
	                </p>
	                <br><br>
	                <p class="description text-center">
	                    <a href="{{ auth()->user()->url_facebook }}" target="_blank" class="btn btn-neutral btn-icon btn-round btn-lg">
	                    	<i class="fab fa-facebook-f"></i>
	                	</a>
	                	<a href="{{ auth()->user()->url_instagram }}" target="_blank" class="btn btn-neutral btn-icon btn-round btn-lg">
	                    	<i class="fab fa-instagram"></i>
	                	</a>	                
	                </p>
	            </div>
	        </div>
	    </div>

@endsection