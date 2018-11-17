@extends('layouts.admin')
@section('title', 'Categorias')

@section('content')
	<div class="col-md-12" id="datatable">
  <div class="card">
      <div class="card-header  pl-4">
          <h4 class="card-title">Categorias</h4> <hr>
          @can('create.categories')
          <a href="{{ route('categories.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar nueva categoria</a>
          <hr>
          @endcan
          
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table id="table" class="table">
                  <thead class=" text-primary">
                      <th>ID</th>
                      <th>Categoria</th>
                      <th>URL amigable</th>
                      <th>Descripción</th>
                      @can('edit.categories')
                      <th>Editar</th>
                      @endcan
                      @can('destroy.categories')
                      <th>Eliminar</th>
                      @endcan
                     
                  </thead>
                  <tbody>
                  	@foreach($categories as $key => $category)
                      <tr>
                          <td>{{ $key+1 }}</td>
                         	<td> {{$category->name}} </td>
                         	<td> {{$category->slug}}</td>
                          <td style="width: 500px;">{{ $category->description }}</td>
                           @can('edit.categories')
                            <td class="text-center"><a href="{{ route('categories.edit', $category->id) }}" style="color:#1D3C60"><i style="font-size: 14pt;" class="fas fa-edit"></i> </a></td>
                           @endcan
                           @can('destroy.categories')
                         	 <td class="text-center">@include('admin.categories.partials.form-delete')</td>
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