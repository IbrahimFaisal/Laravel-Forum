@extends('layouts.app')

@section('content')

    @if(count($channel->discussions))

        @foreach($channel->discussions as $discussion)

            <div class="panel panel-success">

                <div class="panel-heading">

                    <img src="{{ $discussion->user->avatar }}" width="32px" height="34px" class="img-circle">
                    <span>{{ $discussion->user->name }} <b>({{ $discussion->user->points }})</b></span>

                    @if($discussion->hasBestAnswer())

                        <a href="" class="btn btn-xs btn-danger pull-right">discussion closed</a>

                    @else

                        <a href="" class="btn btn-xs btn-success pull-right">discussion open</a>

                    @endif

                </div>

                <div class="panel-body">

                    <a href="{{ route('discussion.single', $discussion->slug) }}" style="text-decoration: none;"><h3 class="text-center">{{ $discussion->title }}</h3></a>
                    <p>{{ str_limit($discussion->body, 180) }}</p>

                </div>

                <div class="panel-footer">

                    <b><i class="fa fa-retweet" aria-hidden="true"></i> {{ count($discussion->replies) }}</b>

                    <a href="" class="btn btn-success btn-xs pull-right">{{ $discussion->channel->name }}</a>

                </div>

            </div>

        @endforeach

    @endif

@endsection
