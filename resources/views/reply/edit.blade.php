@extends('layouts.app')


@section('content')

    <div class="panel panel-default">

        <div class="panel-heading">

            <h4 class="text-center">Edit this reply</h4>

        </div>

        <div class="panel-body">

            <form method="POST" action="{{ route('reply.update',$reply->id) }}">

                {{ csrf_field() }}

                <div class="form-group">

                    <label for="body">Edit Reply</label>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{ $reply->body }}</textarea>

                </div>

                <div class="form-group">

                    <button class="btn btn-success pull-right">Update Reply</button>

                </div>

            </form>

        </div>

    </div>

@endsection