@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-push-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    @guest
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">User name</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                    @else
                    <div>
                    <span>{{ Auth::user()->name  }}</span>
                    <span class="btn pull-right"><a class="btn btn-primary" href="{{ route('advert.create') }}">Create Ad</a></span>
                    </div>
                     <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                    @endguest
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-pull-4">
            <div class="panel panel-default">
                <div class="panel-heading">Adverts</div>

                <div class="panel-body">
                    @foreach($models as $model)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href='{{ route('main.show', $model->id) }}'>{{ $model->title }}</a>
                        </div>

                        <div class="panel-body">
                            {!! $model->description !!}
                        </div>
                        <div class="panel-footer">&nbsp;
                            <ul class="nav navbar-nav my-class">
                                <li>Created: {{ $model->created_at->format('Y-m-d') }}</li>
                                <li style="padding-left: 50px;">Author: {{ $model->user->name }}</li>
                            </ul>
                            @if (Auth::user() && Auth::user()->can('delete', $model))
                            <a class="btn btn-primary pull-right" style="margin-top: -8px;" href="{{ route('advert.delete', $model->id) }}">delete</a>
                            <a class="btn btn-primary pull-right" style="margin-top: -8px; margin-right: 10px;" href="{{ route('advert.update', $model->id) }}">edit</a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                <div style="text-align: center!important;">
                    {{ $models->render() }}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection