@extends('layouts.admin')
@section('title', 'Nuevo usuario')
@section('content')
	<div class="col-xs-12 col-md-8">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Nuevo usuario</h4> <hr>
        </div>
        <div class="card-body">
            {!!Form::open(['route' => 'users.store','method' => 'POST'])!!}
              @include('admin.users.partials.form')
            {!! Form::close() !!}
            <div class="row">
                @if(session('flash_password'))
                <div class="col-xs-12" style="margin-top: 5%;margin-bottom: 5%;padding: 10px;">
                    <span class="alert alert-info"><b>Nota:</b> La <b>contraseña</b>  para este usuario es <b>{{ session('flash_password') }}</b></span>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
