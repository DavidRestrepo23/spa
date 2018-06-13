<!DOCTYPE html>
<html lang="es" prefix="og: http://ogp.me/ns#">
<head>
	<meta charset="UTF-8">
	<title>Blog - La Quinta Agencia - {{$post->title}} </title>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	
	<meta name="description" content="{{$post->meta->description}}">
	<meta name="keywords" content="{{$post->meta->keywords}}" rel="stylesheet">
	<meta name="author" content="La Quinta Agencia - {{$post->user->nickname}} ">
	<meta name="twitter:title" content="{{$post->title}}">
	<meta name="twitter:description" content="{{$post->meta->description}}">
	<meta name="twitter:image" content="{{$post->file}}">

	<meta property="og:type" content="article" />
	<meta property="og:title" content="{{$post->title}}" />
	<meta property="og:description" content="{{$post->meta->description}}" />
	<meta property="og:url" content="{{'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']}} " />
	<meta property="og:site_name" content="La Quinta Agencia - Blog" />
	<meta property="og:image" content="{{$post->file}}" />
	<meta property="og:locale" content="es_ES" />
	
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('vendors/bootstrap/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/blog.css') }}">
	<link rel="stylesheet" href="{{ asset('css/post.css') }}">
	<link rel="stylesheet" href="{{ asset('css/tags.css') }}">
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
						<div class="img-category">
							<img src="{{$post->file}}" title="{{$post->title}}" alt="{{$post->excerpt}}" width="870" height="450">
							<span><a href="{{ url('/categoria/'.$post->category->slug) }}">{{$post->category->name}}</a></span>
						</div>
						<br>
						 <img src="{{$post->user->avatar_image_default}}"  style="width: 25px;height: 25px; float: left;" class="img-responsive img-circle"> &nbsp Creado por <a href="{{ url('/perfil/autor/'.$post->user->nickname) }}"> {{$post->user->name." ".$post->user->lastname}} </a> | <i class="fas fa-clock"></i> {{$post->date_format}}
						<hr>
						<h2><b> {{$post->title}} </b></h2>
					
						<p style="font-size: 15pt;">
							{{$post->excerpt}}
						</p>
						<hr>
						{!!$post->body!!}
						<br>
						<hr>
						<div class="item">
						    <div class="item-content-block tags">
						    	@foreach($post->tags as $tag)
						    	<a href="{{ url('/etiqueta/'.$tag->slug) }}"><i class="fas fa-tags"></i> {{$tag->name}} </a> 
						    	@endforeach
						    </div>
						</div>
						<br>
						<div class="panel panel-default">
							<div class="panel-body">
		                   <div class="post-img">
		                   	<img src="{{$post->user->avatar_image_default}}" style="width: 120px;height: 120px;margin-top: 9px;" class="img-responsive img-thumbnail">
		                   </div>
		                   <p>
		                   	<h3><b><a href="{{ url('/perfil/autor/'.$post->user->nickname)}}">{{$post->user->name." ".$post->user->lastname}}</a></b></h3>
		                   	<p>	
		                   		{!! $post->user->if_exist_url_facebook !!}
								{!! $post->user->if_exist_url_instagram !!}
		                   		<br>
		                   		<p>
		                   			{{$post->user->biography}}
		                   		</p>
		                   	</p>
		                   </p>
						</div>
						</div>
						<hr>
						<!--all post-->
						<h3>Artículos relacionados</h3>
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
					</div>
					@include('blog.html.widget')
				</div>
			</div>
		</div>
	</section>
	@include('blog.html.footer')
</body>
</html>