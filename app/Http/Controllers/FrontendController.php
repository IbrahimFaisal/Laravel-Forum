<?php

namespace App\Http\Controllers;

use App\Discussion;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function single($slug){

        $discussion = Discussion::where('slug', $slug)->first();

        return view('single_discussion', compact('discussion'));

    }

}
