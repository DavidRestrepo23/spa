@extends('layouts.admin')
@section('title', 'Entradas')

@section('content')
	<div class="col-md-12" id="datatable">
  <div class="card">
      <div class="card-header">
          <h4 class="card-title"><i class="fas fa-file"></i> Mis Entradas</h4> <hr>
          <a href="{{ route('posts.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar nueva entrada</a>
          <hr>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table id="table" class="table">
                  <thead class=" text-primary">
                      <th>ID</th>
                      <th>Título</th>
                      <th>URL amigable</th>
                      <th>Categoria</th>
                      <th>Estado</th>
                      <th>Ver</th>
                      <th>Editar</th>
                      <th>Eliminar</th>
                  </thead>
                  <tbody>
                  	@foreach($posts as $key => $post)
                      <tr>
                          <td>{{ $key+1 }}</td>
                         	<td> {{$post->title}} </td>
                         	<td> {{$post->slug}}</td>
                         	<td> {{$post->if_exist_category_name}}</td>
                         	<td> {{$post->post_status}}</td>
                         	<th class="text-center"><a href="{{ route('posts.show', $post->id) }}"><i style="font-size: 14pt;" class="fas fa-eye"></i> </a></th>
                         	<th class="text-center"><a href="{{ route('posts.edit', $post->id) }}" style="color:#1D3C60"><i style="font-size: 14pt;" class="fas fa-edit"></i> </a></th>
                         	<th class="text-center">
                            @include('admin.posts.partials.form-delete')
                          </th>
                      </tr>
                      @endforeach
                  </tbody>
              </table>

          </div>
      </div>
  </div>
</div>
@endsection