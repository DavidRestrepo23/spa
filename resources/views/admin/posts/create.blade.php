@extends('layouts.admin')
@section('title', 'Nueva entrada')

@section('content')
<div class="col-md-12">
  <div class="card" style="margin-bottom: 20px;">
      <div class="card-header">
          <h5 class="card-title pl-4"> Nueva entrada</h5>
      </div>
      {!!Form::open(['route' => 'posts.store','method' => 'POST', 'files' => true])!!}
      {{ csrf_field() }}
      {{Form::hidden('user_id', auth()->user()->id)}}
      <div class="card-body" style="margin-bottom: 30px;">
          <div class="row" style="">
            <div class="col-md-6">
                <div class="form-group">
                    {{Form::label('title', 'Título del artículo',['style' => 'color:#212121;font-size:11pt'])}}
                    {{Form::text('title', old('title'), ['class' => 'form-control', 'style' => 'border:1px solid #c1c1c1' ] )}}
                    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-4" >
                <div class="form-group"> 
                    {{Form::label('slug', 'URL amigable', ['style' => 'color:#212121;font-size:11pt'])}}
                    {{Form::text('slug', old('slug'), ['class' => 'form-control', 'style' => 'border:1px solid #c1c1c1' ])}}
                    {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-xs-12 col-sm-8">
              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Contenido</a>
                  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Texto introductorio e imagen</a>
                  <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Metadatos</a>
                </div>
            </nav>
            <!--TAB CONTENT-->
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                <div class="form-group" style="margin-top: 20px;">
                    <div>
                        {{ Form::textarea('body', null, ['class'=>'form-control','rows'=> '2', 'id' => 'body'])}}  
                    </div> 
                  {!! $errors->first('body', '<p class="help-block">:message</p>') !!} 
              </div>
              </div>

              <!--TEXTO INTRO.-->
              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="form-group" style="margin-top: 20px;">
                  {{Form::label('excerpt', 'Texto de introducción',['style' => 'color:#212121;font-size:11pt'])}}
                  <div>
                      {{ Form::textarea('excerpt', null, ['class'=>'form-control','rows'=> '4', 'id' => 'excerpt', 'style' => 'border:1px solid #c1c1c1', 'maxlength' => '128'])}}                    
                  </div>
                {!! $errors->first('excerpt', '<p class="help-block">:message</p>') !!}
               </div>
              <br>
               <div class="form-group">
                 {{Form::label('file', 'Imagen del artículo', ['style' => 'color:#212121;font-size:11pt'])}}
                 {{Form::file('file',  ['class' => 'form-control', 'style' => 'border-radius:0;border:1px solid #C5C5C5', 'accept' => ' .gif, .jpg, .jpeg, .png'])}}
               </div>
              </div>
              <!--/.TEXTO INTRO.-->


              <!--METADATOS-->
              <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="row" style="margin-top:20px; ">
                  <div class="col-xs-12 col-sm-12">
                      <div class="form-group">
                          {{Form::label('description', 'Meta Descripción',['style' => 'color:#212121;font-size:11pt'])}}
                          {{Form::textarea('description', null, ['class' => 'form-control', 'style' => 'border-radius:0;font-size:10pt;border:1px solid #C5C5C5', 'maxlength' => '128'])}}
                          {!! $errors->first('description', '<p class="help-block">:message</p>') !!} 
                              
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12">
                      <div class="form-group">
                          {{Form::label('keywords', 'Meta Palabras clave (separadas por ,)',['style' => 'color:#212121;font-size:11pt'])}}
                          {{Form::textarea('keywords', null, ['class' => 'form-control', 'style' => 'border-radius:0;font-size:10pt;border:1px solid #C5C5C5', 'placeholder' => 'Example, example2, example3,...'])}}
                          {!! $errors->first('keywords', '<p class="help-block">:message</p>') !!} 

                      </div>
                  </div>
                </div>
              </div>
              <!--/. METADATOS-->
            </div>
            </div>
             <!--/. TAB CONTENT-->



            <div class="col-xs-12 col-sm-4" style="padding: 60px;margin-left: -30px;">
              <!-- STATUS -->
              <div>
                <div class="form-group {{ $errors->has('status') ? 'has-error' : 'no-error'}}">
                  {{Form::label('status', 'Estado',['style' => 'color:#212121;font-size:11pt'])}}
                <br>
               <label style="font-size: 12pt;color:black;">
                    {{Form::radio('status', 'PUBLISHED', ['checked'])}} <span style="color:#22ba1a"><i class="fas fa-check"></i> Publicado</span>
               </label> &nbsp&nbsp
               <label style="font-size: 12pt;color:black;">
                    {{Form::radio('status', 'DRAFT')}} <span style="color:orange"><i class="fas fa-eraser"></i> Borrador</span>
               </label>
                {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
              </div>  

            </div>
            <!-- /.STATUS -->
            <hr>
            <!-- CATEGORY -->
              <div>
                <div class="form-group">
                  {{Form::label('category', 'Categoria', ['style' => 'color:#212121;font-size:11pt'])}}
                  {{Form::select('category_id', $categories , old('category_id'), ['class' => 'form-control', 'style' => 'border:1px solid #c1c1c1' ])}}
                  {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
                 </div>
              </div>
            <!--/.CATEGORY-->
            <hr>
            <!-- TAGS -->
            <div class="form-group {{ $errors->has('tags') ? 'has-error' : 'no-error'}}">
            {{Form::label('tags', 'Etiquetas',['style' => 'color:#212121;font-size:11pt'])}}
            <select name="tags[]" class="selectpicker" id="" multiple="multiple">
              @foreach($tags as $tag)
                <option value="{{ $tag->id }}"> {{$tag->name}} </option>
              @endforeach
            </select>
            <hr>
              {!! $errors->first('tags', '<p class="help-block">:message</p>') !!}
            </div>
            <!--/. TAGS -->
            <div class="row" style="margin-top: 15%;">
              <div class="col-xs-12 col-sm-12 text-center">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar entrada</button>
              </div>
            </div>
            </div>
          </div>
      </div>
      {{Form::close()}}
  </div>
</div>
@endsection

