@extends('layouts.app')


@section('content')

    <div class="panel">

        <div class="panel-heading">

            <h4 class="text-center">Create a discussion</h4>

        </div>

        <div class="panel-body">

            {{ Form::model($discussion,['method'=>'PATCH', 'action'=>['DiscussionsController@update', $discussion->id]]) }}

            {{ csrf_field() }}

            <div class="form-group">

                {{ Form::label('title','Discussion Title:') }}
                {{ Form::text('title',null,['class'=>'form-control']) }}

            </div>

            <div class="form-group">

                {{ Form::label('channel_id','Pick a channel:') }}
                {{ Form::select('channel_id', $channel,null,['class'=>'form-control']) }}

            </div>

            <div class="form-group">

                {{ Form::label('body','Discussion content:') }}
                {{ Form::textarea('body',null,['class'=>'form-control']) }}

            </div>

            <div class="form-group">

                {{ Form::submit('Update Discussion',['class'=>'btn btn-success form-control']) }}

            </div>

            {{ Form::close() }}

        </div>

    </div>

@endsection