@extends('layouts.admin')
@section('title', 'Editar etiqueta')
@section('content')
	<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Editar etiqueta</h4> <hr>
        </div>
        <div class="card-body">
            {!!Form::model($tag, ['route' => ['tags.update', $tag->id] , 'method' => 'PUT'])!!}
              @include('admin.tags.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
