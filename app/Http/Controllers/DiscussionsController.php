<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Discussion;
use App\Reply;
use App\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DiscussionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $discussions = Discussion::orderBy('creted_at', 'desc')->paginate(3);

        return view('discussion', compact('discussions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $channel = Channel::pluck('name',  'id')->all();

        return view('discussion.create', compact('channel'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [

            'title' => 'required|max:255',
            'channel_id' => 'required',
            'body' => 'required'

        ]);

        $user = Auth::id();

        Discussion::create([

            'user_id' => $user,
            'channel_id' => $request->channel_id,
            'body' => $request->body,
            'title' => $request->title,
            'slug' => str_slug($request->title),

        ]);

        Session::flash('success', 'Discussion has been created successfully.');

        return redirect('discussions');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $channel = Channel::pluck('name',  'id')->all();

        $discussion = Discussion::findOrFail($id);

        return view('discussion.edit', compact('channel','discussion'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [

            'title' => 'required|max:255',
            'body' => 'required'

        ]);

        $discussion = Discussion::find($id);

        $discussion->title = $request->title;

        $discussion->channel_id = $request->channel_id;

        $discussion->body = $request->body;

        $discussion->slug = str_slug($request->title);

        $discussion->save();

        Session::flash('success', 'Discussion has been updated successfully.');

        return redirect('discussions');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $discussion = Discussion::find($id);

        $discussion->delete();

        Session::flash('success', 'Discussion has been deleted successfully.');

        return redirect('discussions');

    }


    public function reply($id){

        $this->validate(request(), [

            'body' => 'required|min:2'

        ]);

        $discussion = Discussion::find($id);

        $reply = Reply::create([

            'user_id' => Auth::id(),
            'discussion_id' => $id,
            'body' => request()->body,

        ]);

        $reply->user->points += 25;

        $reply->user->save();

        Session::flash('success', 'Reply uploaded successfully.');

        return redirect()->back();

    }



}
