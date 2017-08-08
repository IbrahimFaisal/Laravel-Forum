<?php

namespace App\Providers;

use App\Channel;
use App\Discussion;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        View::share('channels', Channel::all());
        View::share('discussions', Discussion::orderBy('created_at', 'desc')->paginate(3));

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
