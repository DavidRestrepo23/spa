{{ csrf_field() }}
<div class="row" style="margin-bottom: 60px;" >
    <div class="col-md-4 pr-1">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : 'no-error'}}">
            {{Form::label('name', 'Nombre de la etiqueta',['style' => 'color:#212121;font-size:13pt'])}}
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
<div class="col-md-4 px-1">
    <button type="submit" style="bottom: 0" data-toggle="tooltip" data-placement="top" title="Guardar Etiqueta" class="btn btn-success btn-circle btn-lg"><i class="fas fa-save" ></i></button>
</div>
