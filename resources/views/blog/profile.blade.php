<!DOCTYPE html>
<html lang="es" prefix="og: http://ogp.me/ns#">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title> Blog La Quinta Agencia - Autor {{$user->nickname}} </title>	
	<meta name="author" content=" {{$user->name." ".$user->lastname}} ">
	<meta name="description" content="{{ $user->biography }}">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="{{$user->nickname}}">
	<meta name="twitter:description" content="{{ $user->biography }}">
	<meta name="twitter:image" content="{{ asset('img/icon.png') }}">
	<meta property="og:type" content="article" />
	<meta property="og:title" content="{{$user->nickname}}" />
	<meta property="og:description" content="{{ $user->biography }}" />
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
						<div class="panel panel-default">
						<div class="panel-body">
		                   <div class="post-img" style="margin-left: 30px;">
		                   	<img src="{{$user->avatar_image_default}}" style="width: 120px;height: 120px;margin-top: 10px;" class="img-responsive img-circle">
		                   </div>
		                   <p>
		                   	<h3><b>{{$user->name." ".$user->lastname}} <small> {{$user->nickname}} </small></b></h3>
		                   	<p>	
								{!! $user->if_exist_url_facebook !!}
								{!! $user->if_exist_url_instagram !!}
		                   		<br>
		                   	</p>
		                   	<span style="margin-top: 15px;">
		                   			{{$user->biography}}
		                   		</span>
		                   </p>
						</div>
					</div>
					<!-- featured post -->
					<div class="panel panel-default">
						<div class="panel panel-body">
							<div class="img-category">
							<a href="{{ url('/'.$postLast->slug) }}"><img src="{{$postLast->file}}" title="{{$postLast->title}}" alt="{{$postLast->excerpt}}" width="870" height="450"> </a>
							<span><a href="{{ url('/categoria/'.$postLast->category->slug) }}">{{$postLast->category->name}}</a></span>
						</div>
						<br>
						<span class="datetime"><i class="fas fa-clock"></i> {{$postLast->date_format}} | <a href="{{ url('/perfil/autor/'.$user->nickname) }}"><i class="fas fa-user"></i> {{$user->name." ".$user->lastname}}</a></span>
						<br>
						<h3> {{$postLast->title}} </h3>
						<p>
							{{$postLast->excerpt}}

						</p>
						<br>
						<a href="{{ url('/'.$postLast->slug) }}" class="btn btn-default" style="background: #ff3636;color:white">Leer más <i class="fas fa-chevron-right"></i></a>
						</div>
					</div>
	
					<!-- featured post -->
					<hr>
					<!--all post-->
					<h3>Más artículos de este autor</h3>
					<hr>
					<div class="row posts">
					@foreach($posts as $post)
					<div class="col-xs-12 col-sm-6" style="height: 340px;margin-bottom: 40px;">
					<div class="panel panel-default">
						<div class="panel-body">	
						<div class="img-category">
							<a href="{{ url('/'.$post->slug) }}"><img src="{{$post->file}}" title="{{ $post->title }}" alt="{{ $post->excerpt }}" width="870" height="150"></a>
							<span><a href="{{ url('/categorias/'.$post->category->slug) }}"> {{$post->category->name}} </a></span>
						</div>
						<br>
						<span class="datetime"><i class="fas fa-clock"></i> {{$post->date_format}} | <a href="{{ url('/perfil/autor/'.$post->user->nickname) }}"><i class="fas fa-user"></i> {{$post->user->name." ".$post->user->lastname}} </a></span>
						<a href="{{ url('/'.$post->slug) }}" style="color:black;"><h4>{{$post->title}}</h4></a>								
						<p>
							{{$post->excerpt}}
						</p>
							</div>
						</div>
					</div>
					@endforeach
					</div>
					<hr>
					<div class="row">
						<div class="row center-block text-center render">
						{{$posts->links()}}
						</div>
					</div>	
					<!--all post-->
					</div>
					@include('blog.html.widget')
				</div>
			</div>
		</div>
	</section>
	@include('blog.html.footer')
</body>
</html>