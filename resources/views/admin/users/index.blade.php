@extends('layouts.admin')
@section('title', 'Usuarios')

@section('content')
	<div class="col-md-12" id="datatable">
  <div class="card">
      <div class="card-header">
          <h4 class="card-title"><i class="fas fa-users"></i> Usuarios</h4> <hr>
          @can('create.users')
          <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar nuevo usuario</a>
          <hr>
          @endcan
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table id="table" class="table">
                  <thead class=" text-primary">
                      <th class="text-center">ID</th>
                      <th class="text-center">Nombre</th>
                      <th class="text-center">Correo</th>
                      <th class="text-center">Articulos creados</th>
                      <th class="text-center">Estado</th>
                      <th class="text-center">Rol</th>
                      @can('edit.users')
                      <th class="text-center">Editar</th>
                      @endcan
                      @can('destroy.users')
                      <th class="text-center">Eliminar</th>
                      @endcan
                      
                  </thead>
                  <tbody>
                  	@foreach($users as $key => $user)
                      <tr>
                          <td class="text-center">{{ $key+1 }}</td>
                         	<td> {{$user->name." ".$user->lastname}} </td>
                          <td class="text-center">{{ $user->email }}</td>
                          <td class="text-center">{{ $user->posts()->count() }}</td>
                          <td class="text-center {{$user->status}} ">{{ $user->status_change_language }}</td>
                          <td class="text-center"> {{$user->role_names}}</td>
                          @can('edit.users')
                          <td class="text-center"><a href="{{ route('users.edit', $user->id) }}" style="color:#1D3C60"><i style="font-size: 14pt;" class="fas fa-edit"></i> </a></td>
                          @endcan
                          @can('destroy.users')
                         	<td class="text-center">@include('admin.users.partials.form-delete')</td>
                          @endcan
                      </tr>
                      @endforeach
                  </tbody>
              </table>

          </div>
      </div>
  </div>
</div>
@endsection