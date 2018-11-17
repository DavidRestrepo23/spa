{{ csrf_field() }}
<div class="row" >
    <div class="col-md-12">
        <div class="form-group">
            {{Form::label('name', 'Nombre de la categoria',['style' => 'color:#212121;font-size:11pt'])}}
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
<div class="row " style="margin-top: 20px;margin-bottom: 60px;">
    <div class="col-md-12">
        <div class="form-group {{ $errors->has('description') ? 'has-error' : 'no-error'}}">
            {{Form::label('description', 'Descripción',['style' => 'color:#212121;font-size:13pt'])}}
            {{Form::textarea('description', old('description'), ['class' => 'form-control', 'id' => 'title', 'style' => 'border-radius:0;font-size:10pt;border:1px solid #C5C5C5'])}}
            {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-12 mt-3">
        <button type="submit" class="btn btn-success"><i class="fas fa-save" ></i> Guardar categoría</button>
    </div>
</div>

