<!DOCTYPE html>
<html lang="es" prefix="og: http://ogp.me/ns#">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title> Blog La Quinta Agencia - {{$tag->name}} </title>	
	<meta name="author" content="La Quinta Agencia">
	<meta name="description" content="{{ $tag->name }}">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="{{$tag->name}}">
	<meta name="twitter:description" content="{{ $tag->name }}">
	<meta name="twitter:image" content="{{ asset('img/icon.png') }}">
	<meta property="og:type" content="article" />
	<meta property="og:title" content="{{$tag->name}}" />
	<meta property="og:description" content="{{ $tag->name }}" />
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
					<!-- featured post -->
						<br>
						<h3 class="text-uppercase"><b>{{$tag->name}}</b></h3>
						<br>
						<hr>
						<!-- featured post -->
						<!--all post-->
						<div class="row posts">
						@foreach($posts as $post)
						<div class="col-xs-12 col-sm-6" style="height: 340px;margin-bottom: 40px;">
						<div class="panel panel-default">
							<div class="panel-body">
							<div class="img-category">
								<a href="{{ url('/'.$post->slug) }}"><img src="{{ $post->file }}" title="{{ $post->title }}" height="150" alt=" {{$post->excerpt}} "></a>
								<span><a href="{{ url('/categoria/'.$post->category->slug) }}">{{$post->category->name}}</a></span>
							</div>
							<br>
						<span class="datetime"><i class="fas fa-clock"></i> {{$post->date_format}} | <a href="{{ url('/perfil/autor/'.$post->user->nickname) }}"><i class="fas fa-user"></i> {{$post->user->name." ".$post->user->lastname}} </a></span>
							<a href="" style="color:black"><h4>{{$post->title}}</h4></a>
							<p >
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