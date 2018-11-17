@extends('layouts.admin')
@section('title', 'Nueva categoria')
@section('content')
	<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title pl-2">Nueva categoria</h4> <hr>
        </div>
        <div class="card-body">
            {!!Form::open(['route' => 'categories.store', 'method' => 'POST', 'files' => true])!!}
              @include('admin.categories.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
