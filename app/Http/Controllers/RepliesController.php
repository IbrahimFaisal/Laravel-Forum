<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Like;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RepliesController extends Controller
{

    public function like($id){

        $reply = Reply::find($id);

        Like::create([

            'user_id' => Auth::id(),
            'reply_id' => $id,

        ]);

        return redirect()->back();

    }

    public function unlike($id){

        $like = Like::where('reply_id', $id)->where('user_id', Auth::id())->first();

        $like->delete();

        return redirect()->back();

    }

    public function best_answer($id){

        $reply = Reply::find($id);

        $reply->best_answer = 1;

        $reply->save();

        $reply->user->points += 50;

        $reply->user->save();

        return redirect()->back();

    }




    public function edit($id){

        $reply = Reply::findOrFail($id);

        return view('reply.edit', compact('reply'));

    }


    public function update($id){

        $this->validate(request(), [

            'body' => 'required'

        ]);

        $reply = Reply::find($id);

        $reply->body = request()->body;

        $reply->save();

        Session::flash('success', 'Reply updated successfully.');

        return redirect()->route('discussion.single', $reply->discussion->slug);

    }

}
