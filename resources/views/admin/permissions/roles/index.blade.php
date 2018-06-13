@extends('layouts.admin')
@section('title', 'Nuevo rol')
@section('content')
  <div class="col-xs-12 col-md-8">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Nuevo rol</h4> <hr>
            @can('create.roles')
            <a href="{{ route('roles.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar nuevo rol</a>
            @endcan
        </div>
          <div class="card-body">
              <table id="table" class="table">
                  <thead class=" text-primary">
                      <th>ID</th>
                      <th>Nombre</th>
                      @can('add.permissions')
                      <th>Asignar permisos</th>
                      @endcan
                      @can('edit.roles')
                      <th>Editar</th>
                      @endcan
                      @can('destroy.roles')
                      <th>Eliminar</th>
                      @endcan
                  </thead>
                  <tbody>
                    @foreach($roles as $key => $rol)
                      <tr>
                          <td>{{ $key+1 }}</td>
                          <td> {{$rol->name}} </td>
                          @can('add.permissions')
                          <td><a href="{{ route('permissions.edit', $rol->id) }}"><i class="fas fa-lock"></i> Asignar Permisos</a></td>
                          @endcan
                          @can('edit.roles')
                          <td><a href="{{ route('roles.edit', $rol->id) }}" style="color:#1D3C60"><i style="font-size: 14pt;" class="fas fa-edit"></i> </a></td>
                          @endcan
                          @can('destroy.roles')
                          <td class="text-center">@include('admin.permissions.roles.partials.form-delete')</td>
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
