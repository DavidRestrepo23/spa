@extends('layouts.admin')
@section('title', 'Nueva etiqueta')
@section('content')
	<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title pl-3">Nueva etiqueta</h4> <hr>
        </div>
        <div class="card-body">
            {!!Form::open(['route' => 'tags.store', 'method' => 'POST'])!!}
              @include('admin.tags.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
