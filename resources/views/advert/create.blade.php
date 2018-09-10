@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">Create Advert</div>

        <div class="panel-body">
            {!! Form::open(['route' => 'advert.save', 'class' => 'form-horizontal']) !!}
            {!! \View::make('advert._form', ['errors'=>$errors, 'model' => $model]) !!}

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">

                    {{ Form::submit('Create', ['class' => 'pull-right']) }}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection

