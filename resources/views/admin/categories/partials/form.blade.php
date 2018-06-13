{{ csrf_field() }}
<div class="row" >
    <div class="col-md-4 pr-1">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : 'no-error'}}">
            {{Form::label('name', 'Nombre de la categoria',['style' => 'color:#212121;font-size:13pt'])}}
            {{Form::text('name', old('name'), ['class' => 'form-control', 'id' => 'title'])}}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-4 px-1" >
        <div class="form-group {{ $errors->has('slug') ? 'has-error' : 'no-error'}}"> 
            {{Form::label('slug', 'URL amigable', ['style' => 'color:#212121;font-size:13pt'])}}
            {{Form::text('slug', old('slug'), ['class' => 'form-control', 'id' => 'slug'])}}
            {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row" style="margin-top: 20px;margin-bottom: 60px;">
    <div class="col-md-6 pr-1">
        <div class="form-group {{ $errors->has('description') ? 'has-error' : 'no-error'}}">
            {{Form::label('description', 'Descripción',['style' => 'color:#212121;font-size:13pt'])}}
            {{Form::textarea('description', old('description'), ['class' => 'form-control', 'id' => 'title', 'style' => 'border-radius:0;font-size:10pt;border:1px solid #C5C5C5'])}}
            {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="col-md-4 px-1">
    <button type="submit" style="bottom: 0" data-toggle="tooltip" data-placement="top" title="Guardar Categoria" class="btn btn-success btn-circle btn-lg"><i class="fas fa-save" ></i></button>
</div>
