<!DOCTYPE html>
<html lang="es" prefix="og: http://ogp.me/ns#">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title> Blog La Quinta Agencia - Autor  </title>	
	<meta name="author" content="  ">
	<meta name="description" content="">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="">
	<meta name="twitter:description" content="">
	<meta name="twitter:image" content="{{ asset('img/icon.png') }}">
	<meta property="og:type" content="article" />
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:url" content="{{'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']}} " />
	<meta property="og:site_name" content="La Quinta Agencia - Blog" />
	<meta property="og:image" content="{{ asset('img/icon.png') }}" />
	<meta property="og:locale" content="es_ES" />
	
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('vendors/bootstrap/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/blog.css') }}">
	<link rel="stylesheet" href="{{ asset('css/post.css') }}">
</head>
<body>
	<header>
		
	</header>
	<section >
		<div class="container content" >
			<div class="row">
				<div class="col-xs-12 col-sm-12">
					@include('blog.html.nav')
				</div>
				<div class="col-xs-12 col-md-12">
					
					<div class="col-xs-12 col-sm-8">
					@foreach($users as $user)
						<div class="panel panel-default">
						<div class="panel-body">
		                   <div class="post-img" style="margin-left: 30px;">
		                   <a href="{{ url('/perfil/autor/'.$user->nickname) }}"><img src="{{$user->avatar_image_default}}" style="width: 120px;height: 120px;margin-top: 10px;" class="img-responsive img-circle"></a>
		                   </div>
		                   <p>
		                   	<a href="{{ url('/perfil/autor/'.$user->nickname) }}" style="color:black"><h3><b>{{$user->name." ".$user->lastname}} <small> {{$user->nickname}} </small></b></h3></a>
		                   	<p>	
								{!! $user->if_exist_url_facebook !!}
								{!! $user->if_exist_url_instagram !!}
		                   		<br>
		                   	</p>
		                   	<span style="margin-top: 15px;">
		                   		{{$user->biography}}
		                   		<br><br>
		                   	</span>
		                   </p>
						</div>
					</div>
					<br>

					@endforeach
			
					</div>
					@include('blog.html.widget')
				</div>
			</div>
		</div>
	</section>
	@include('blog.html.footer')
</body>
</html>