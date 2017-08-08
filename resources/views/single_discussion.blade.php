@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading pane">

            <img src="{{ $discussion->user->avatar }}" width="32px" height="34px" class="img-circle">
            <span> {{ $discussion->user->name }} <b>({{ $discussion->user->points }})</b></span>

            @if(Auth::id() == $discussion->user_id)

                <a href="{{ route('discussion.edit', $discussion->id) }}" class="btn btn-xs btn-warning pull-right">edit discussion</a>

            @endif

        </div>

        <div class="panel-body">

            <h3 class="text-center">{{ $discussion->title }}</h3>
            <p>{{ $discussion->body }}</p>

        </div>

        <div class="panel-footer">

            <b><i class="fa fa-retweet" aria-hidden="true"></i> {{ count($discussion->replies) }}</b>

            <a href="" class="btn btn-success btn-xs pull-right">{{ $discussion->channel->name }}</a>

        </div>


        @foreach($discussion->replies as $reply)

            @if($reply->best_answer == 1)

                <h4 class="text-center">Best Answer</h4>

                <div class="side_pad">

                    <div class="panel panel-success">

                        <div class="panel-heading">

                            <img src="{{ $reply->user->avatar }}" width="32px" height="34px" class="img-circle">
                            <span>{{ $reply->user->name }} <b>({{ $reply->user->points }})</b></span>

                        </div>

                        <div class="panel-body">

                            {{ $reply->body }}

                        </div>

                        <div class="panel-footer">

                            @if($reply->is_liked_by_auth_user())

                                <a href="{{ route('reply.unlike', $reply->id) }}" style="text-decoration: none;"><i class="fa fa-thumbs-down" aria-hidden="true"></i> {{ count($reply->likes) }}</a>

                            @else

                                <a href="{{ route('reply.like', $reply->id) }}" style="text-decoration: none;"><i class="fa fa-thumbs-up" aria-hidden="true"></i> {{ count($reply->likes) }}</a>

                            @endif



                        </div>

                    </div>

                </div>

                @else

            @endif

        @endforeach


    </div>


    @if(count($discussion->replies) > 0)

        @foreach($discussion->replies as $reply)

            @if($reply->best_answer == 1)


                @else

            <div class="side-mar">

                <div class="panel panel-default">

                    <div class="panel-heading">

                        <img src="{{ $reply->user->avatar }}" width="32px" height="34px" class="img-circle">
                        <span>{{ $reply->user->name }} <b>({{ $reply->user->points }})</b></span>

                        @if(Auth::id() == $reply->user_id)

                                <a href="{{ route('reply.edit', $reply->id) }}" class="btn btn-xs btn-warning pull-right">edit reply</a>

                        @else

                            <a href="{{ route('reply.best', $reply->id) }}" class="btn btn-xs btn-info pull-right">mark as best answer</a>

                        @endif

                    </div>

                    <div class="panel-body">

                        {{ $reply->body }}

                    </div>

                    <div class="panel-footer">

                        @if($reply->is_liked_by_auth_user())

                            <a href="{{ route('reply.unlike', $reply->id) }}" style="text-decoration: none;"><i class="fa fa-thumbs-down" aria-hidden="true"></i> {{ count($reply->likes) }}</a>

                        @else

                            <a href="{{ route('reply.like', $reply->id) }}" style="text-decoration: none;" ><i class="fa fa-thumbs-up" aria-hidden="true"></i> {{ count($reply->likes) }}</a>

                        @endif

                    </div>

                </div>

            </div>

            @endif

        @endforeach

    @endif


        @if($discussion->hasBestAnswer())

        @else

            <div class="panel panel-default">

            <div class="panel-body">

            <form method="POST" action="{{ route('discussion.reply', $discussion->id) }}">

                {{ csrf_field() }}

                <div class="form-group">

                    <label for="body">Leave a Reply</label>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>

                </div>

                <div class="form-group">

                    <button class="btn btn-success pull-right">Leave a reply</button>

                </div>

            </form>

            </div>

            </div>

        @endif


@endsection
