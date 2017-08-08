<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Discussion extends Model
{

    protected $fillable = [

        'title', 'body', 'slug', 'user_id', 'channel_id'

    ];

    public function user(){

        return $this->belongsTo('App\User');

    }

    public function channel(){

        return $this->belongsTo('App\Channel');

    }

    public function replies(){

        return $this->hasMany('App\Reply');

    }

    public function views(){

        return $this->hasMany('App\View');

    }

    public function hasBestAnswer(){

        $result = false;

        foreach ($this->replies as $reply){

            if($reply->best_answer == 1){

                $result = true;
                break;
            }

        }

        return $result;

    }


}
