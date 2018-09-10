@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">Update Advert</div>

        <div class="panel-body">

            @if(Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
            {!! Form::model($model, ['route' => ['advert.update', $model->id], 'class' => 'form-horizontal']) !!}
            {!! \View::make('advert._form', ['errors'=>$errors, 'model' => $model]) !!}
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">

                    {{ Form::submit('Save', ['class' => 'pull-right']) }}
                    <a class="btn btn-primary btn-sm pull-right" style=" margin-right: 15px;" href="{{ route('advert.delete', $model->id) }}">delete</a>

                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


@endsection

