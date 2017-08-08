@extends('layouts.app')


@section('content')

    <div class="panel">

        <div class="panel-heading">

            <h4>All Channel</h4>

        </div>

        <div class="panel-body">

            <table class="table table-striped">

                <thead>

                    <tr>

                        <th>Channel</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>

                </thead>

                <tbody>

                    @if(count($channels) > 0)

                        @foreach($channels as $channel)

                            <tr>

                                <td>{{ $channel->name }}</td>

                                <td>

                                    <a href="{{ route('channel.edit',$channel->id) }}" class="btn btn-success btn-xs">edit</a>

                                </td>

                                <td>

                                    {{ Form::open(['method'=>'DELETE', 'action'=>['ChannelsController@destroy', $channel->id]]) }}

                                    {{ csrf_field() }}

                                    <div class="form-group">

                                        {{ Form::submit('delete',['class'=>'btn btn-danger btn-xs']) }}

                                    </div>

                                    {{ Form::close() }}

                                </td>

                            </tr>

                        @endforeach

                    @else

                        <tr class="text-center">No channel created yet</tr>

                    @endif

                </tbody>

            </table>

        </div>

    </div>

@endsection