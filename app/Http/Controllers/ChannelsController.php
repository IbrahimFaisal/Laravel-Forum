<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChannelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('channel.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('channel.create');

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

            'name' => 'required|min:2'

        ]);

        Channel::create([

            'name' => $request->name,
            'slug' => str_slug($request->name),

        ]);

        Session::flash('success', 'Channel created successfully.');

        return redirect('channel');

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

        $channel = Channel::findOrFail($id);

        return view('channel.edit', compact('channel'));

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

        $channel = Channel::find($id);

        $this->validate($request, [

            'name' => 'required|min:2'

        ]);

        $channel->name = $request->name;

        $channel->slug = str_slug($request->name);

        $channel->save();

        Session::flash('success', 'Channel updated successfully.');

        return redirect('channel');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $channel = Channel::find($id);

        $channel->delete();

        Session::flash('success', 'Channel deleted successfully.');

        return redirect('channel');

    }

    public function channel_single($slug){

        $channel = Channel::where('slug', $slug)->first();

        return view('single', compact('channel'));

    }

}
