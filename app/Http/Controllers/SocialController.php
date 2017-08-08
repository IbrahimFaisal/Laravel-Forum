<?php

namespace App\Http\Controllers;

use SocialAuth;
use Illuminate\Http\Request;

class SocialController extends Controller
{

    public function index($provider){

        return SocialAuth::authorize($provider);

    }

    public function auth_callback($provider){

        SocialAuth::login($provider, function ($user, $details){

            $user->name = $details->nickname;

            $user->avatar = $details->avatar;

            $user->email = $details->email;

            $user->save();

        });


        return redirect('/discussions');
    }

}
