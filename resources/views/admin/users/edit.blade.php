@extends('layouts.admin')
@section('title', 'Editar usuario')
@section('content')
	<div class="col-xs-12 col-md-8">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Editar usuario</h4> <hr>
        </div>
        <div class="card-body">
            {!!Form::model($user, ['route' => ['users.update',$user->id], 'method' => 'PUT'])!!}
              @include('admin.users.partials.form-edit')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
