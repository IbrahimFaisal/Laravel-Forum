@extends('layouts.app')


@section('content')

    <div class="panel">

        <div class="panel-heading">

            <h4 class="text-center">Edit this channel</h4>

        </div>

        <div class="panel-body">

            {{ Form::model($channel,['method'=>'PATCH', 'action'=>['ChannelsController@update',$channel->id]]) }}

            {{ csrf_field() }}

            <div class="form-group">

                {{ Form::label('name','Channel:') }}
                {{ Form::text('name',null,['class'=>'form-control']) }}

            </div>

            <div class="form-group">

                {{ Form::submit('Update Channel',['class'=>'btn btn-success form-control']) }}

            </div>

            {{ Form::close() }}

        </div>

    </div>

@endsection