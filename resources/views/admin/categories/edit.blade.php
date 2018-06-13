@extends('layouts.admin')
@section('title', 'Editar categoria')
@section('content')
	<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Editar categoria</h4> <hr>
        </div>
        <div class="card-body">
            {!!Form::model($category, ['route' => ['categories.update', $category->id] , 'method' => 'PUT'])!!}
              @include('admin.categories.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
