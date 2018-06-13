@extends('layouts.admin')
@section('title')
	{{$post->title}}
@endsection

@section('content')
	<div class="col-md-12">
        <div class="card">
            <div class="card-body">
				<h4>{{$post->title}} <small> {{$post->slug}} </small></h4>
				<hr>
				<i class="fas fa-tag"></i> Etiquetas:  
					@foreach($post->tags as $tag)
						 <span style="color:#ff3636">{{$tag->name}}</span> 
					@endforeach
					&nbsp | &nbsp
				<i class="fas fa-folder-open"></i> Categoria <span style="color:#ff3636">{{$post->category->name}}</span>  &nbsp&nbsp |  &nbsp
				<i class="fas fa-user"></i> Autor <span style="color:#ff3636">{{$post->user->name}}</span> &nbsp&nbsp | &nbsp
				<i class="fas fa-clock"></i> Fecha de creación <span style="color:#ff3636">{{$post->created_at}}</span> &nbsp&nbsp | &nbsp
				<i class="fas fa-check"></i> Estado <span style="color:#ff3636">{{$post->post_status}}</span>
				<hr>
				<img src=" {{$post->file}}" style="width: 100%;" alt="">
				<hr>
				<h3> {!! $post->excerpt !!} </h3>
				<p>
					{!! $post->body !!}
				</p>
            </div>
        </div>

		
    </div>
@endsection