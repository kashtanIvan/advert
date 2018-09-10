<?php
use Illuminate\Support\Facades\Auth;

?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{$model->title}}</div>

                <div class="panel-body">
                    {!! $model->description !!}
                </div>
                <div class="panel-footer">&nbsp;
                    <ul class="nav navbar-nav my-class">
                        <li>Created: {{ $model->created_at->format('Y-m-d') }}</li>
                        <li style="padding-left: 50px;">Author: {{ $model->user->name }}</li>
                    </ul>
                    @if (Auth::user()->can('delete', $model))
                    <a class="btn pull-right" style="margin-top: -8px;" href="{{ route('advert.delete', $model->id) }}">delete</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

