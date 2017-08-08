@extends('layouts.app')


@section('content')

    <div class="panel">

        <div class="panel-heading">

            <h4 class="text-center">Create a channel</h4>

        </div>

        <div class="panel-body">

            {{ Form::open(['method'=>'POST', 'action'=>'ChannelsController@store']) }}

            {{ csrf_field() }}

            <div class="form-group">

                {{ Form::label('name','Channel:') }}
                {{ Form::text('name',null,['class'=>'form-control']) }}

            </div>

            <div class="form-group">

                {{ Form::submit('Store Channel',['class'=>'btn btn-success form-control']) }}

            </div>

            {{ Form::close() }}

        </div>

    </div>

@endsection