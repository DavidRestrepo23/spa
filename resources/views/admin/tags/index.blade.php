@extends('layouts.admin')
@section('title', 'Etiquetas')

@section('content')
	<div class="col-md-12" id="datatable">
  <div class="card">
      <div class="card-header">
          <h4 class="card-title"><i class="fas fa-tags"></i> Etiquetas</h4> <hr>
          @can('create.tags')
          <a href="{{ route('tags.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar nueva etiqueta</a>
          <hr>
          @endcan
          
      </div>
      <div class="card-body col-xs-12 col-sm-8">
          <div class="table-responsive">
              <table id="table" class="table">
                  <thead class=" text-primary">
                      <th>ID</th>
                      <th>Etiqueta</th>
                      <th>URL Amigable</th>
                      @can('edit.tags')
                      <th>Editar</th>
                      @endcan
                      @can('destroy.tags')
                      <th>Eliminar</th>
                      @endcan
                  </thead>
                  <tbody>
                  	@foreach($tags as $key => $tag)
                      <tr>
                          <td>{{ $key+1 }}</td>
                         	<td> {{$tag->name}} </td>
                         	<td> {{$tag->slug}}</td>
                          @can('edit.tags')
                          <td class="text-center"><a href="{{ route('tags.edit', $tag->id) }}" style="color:#1D3C60"><i style="font-size: 14pt;" class="fas fa-edit"></i> </a></td>
                          @endcan
                          @can('destroy.tags')
                         	<td class="text-center">@include('admin.tags.partials.form-delete')</td>
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