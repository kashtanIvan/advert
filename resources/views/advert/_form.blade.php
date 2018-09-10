

<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
    {{ Form::label('title', null, ['class' => 'col-md-2 control-label']) }}
    <div class="col-md-8">
        {{ Form::text('title', old('title', $model->title), ['class' => 'form-control col-md-4']) }}
    </div>
    @if ($errors->has('title'))
    <span class="help-block">
        <strong>{{ $errors->first('title') }}</strong>
    </span>
    @endif
</div>

<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
    {{ Form::label('description', null, ['class' => 'col-md-2 control-label']) }}
    <div class="col-md-8">
        {{ Form::textarea('description', old('description', $model->description), ['class' => 'form-control col-md-4 ckeditor']) }}
    </div>
    @if ($errors->has('description'))
    <span class="help-block">
        <strong>{{ $errors->first('description') }}</strong>
    </span>
    @endif
</div>
