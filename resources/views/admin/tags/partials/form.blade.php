{{ csrf_field() }}
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {{Form::label('name', 'Nombre de la Etiqueta',['style' => 'color:#212121;font-size:11pt'])}}
            {{Form::text('name', old('name'), ['class' => 'form-control', 'id' => 'title', 'style' => 'border:1px solid #c1c1c1' ] )}}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-12" >
        <div class="form-group"> 
            {{Form::label('slug', 'URL amigable', ['style' => 'color:#212121;font-size:11pt'])}}
            {{Form::text('slug', old('slug'), ['class' => 'form-control', 'id' => 'slug' ,'style' => 'border:1px solid #c1c1c1' ])}}
            {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="col-md-4 px-1">
    <button type="submit" class="btn btn-success"><i class="fas fa-save" ></i> Guardar etiqueta</button>
</div>
