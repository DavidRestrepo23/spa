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
		<span class="datetime">
			<i class="fas fa-clock"></i> {{$post->date_format}} | 
			<a href="{{ url('/perfil/autor/'.$post->user->nickname) }}">
			<i class="fas fa-user"></i> {{$post->user->name." ".$post->user->lastname}} </a>
		</span>
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
	<div class="row center-block text-center">
	{{$posts->links()}}
	</div>
</div>
