<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
<link rel="stylesheet" href="{{ asset('vendors/typeahead/typeahead.css') }}">
<div class="col-xs-12 col-sm-4">
<div class="panel panel-default">
	<div class="panel-heading">
		<h5><i style="color:#212121" class="fa fa-search"></i> Buscar artículo</h5>
	</div>
	<div class="panel-body">
		<form method="GET" action="{{ url('/busqueda/') }}" class="navbar-form navbar-left">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Buscar...." name="query" id="search-posts">
	        </div>
    		<button type="submit" class="btn btn-default"><i class="fas fa-search"></i> Buscar</button>
		</form>
	</div>
</div>
	
<div class="panel panel-default">
	<div class="panel-heading">
		<h5><i style="color:#212121" class="fas fa-sitemap"></i> Categorias</h5>
	</div>
	<div class="panel-body">
		<ul class="list-group">
		  @foreach($categories as $category)
		  <li class="list-group-item">
		    <span class="badge">{{$category->posts->count()}}</span>
		    <a href="{{ url('/categoria/'.$category->slug) }}" style="color:black">{{$category->name}}</a>
		  </li>
		  @endforeach
		</ul>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		<h5><i style="color:#212121" class="fa fa-star"></i> Artículos más leidos</h5>
	</div>
	<div class="panel-body">
	<div class="content-widget-sidebar">
       <div class="slider">
       		@foreach($postMaxView as $post) 
    		<div><a href="{{ url('/'.$post->slug) }}"><img src="{{$post->file}}" title="{{$post->title}}" alt="{{$post->excerpt}}" style="width: 100%;" class="img-responsive"></a></div>
    		@endforeach
  	  </div>
	</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-body">
	<section class="home-newsletter">
	<div class="single">
			<h2>Suscribete a nuestro boletín</h2>
			<img style="width: 100px;margin-top: -20px;margin-bottom: 30px;" src="https://www.terwa.com/upload/7/660/icon-enewsletter.png" alt="">
			<div class="input-group">
		         <input type="email" class="form-control" placeholder="Enter your email">
		         <span class="input-group-btn">
		         <button class="btn btn-theme" type="submit">Suscribirme!</button>
		         </span>
	     	</div>
	</section>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		Síguenos también
	</div>
	<div class="panel-body">
		<a href="https://www.instagram.com/quintadesign/" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>&nbsp&nbsp
		<a href="https://www.behance.net/LaQuinta" target="_blank"><i class="fab fa-behance fa-2x"></i></a>
	</div>
</div>
</div>