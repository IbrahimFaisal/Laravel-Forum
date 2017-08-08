<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/discussions', [

    'uses' => 'HomeController@index',
    'as' => 'discussions'

]);

Route::get('/channel/{slug}', [

    'uses' => 'ChannelsController@channel_single',
    'as' => 'channel.single'

]);


Route::get('{provider}/auth', [

    'uses' => 'SocialController@index',
    'as' => 'social.auth'

]);

Route::get('{provider}/redirect', [

    'uses' => 'SocialController@auth_callback',
    'as' => 'social.callback'

]);

Route::get('/discussion/{slug}', [

    'uses' => 'FrontendController@single',
    'as' => 'discussion.single'

]);


Route::get('/reply/like/{id}', [

    'uses' => 'RepliesController@like',
    'as' => 'reply.like'

]);

Route::get('/reply/unlike/{id}', [

    'uses' => 'RepliesController@unlike',
    'as' => 'reply.unlike'

]);

Route::get('/reply/best/{id}', [

    'uses' => 'RepliesController@best_answer',
    'as' => 'reply.best'

]);


Route::post('/discussion/create/{id}', [

    'uses' => 'DiscussionsController@reply',
    'as' => 'discussion.reply'

]);


Route::get('/reply/{id}/edit', [

    'uses' => 'RepliesController@edit',
    'as' => 'reply.edit'

]);


Route::post('/reply/update/{id}', [

    'uses' => 'RepliesController@update',
    'as' => 'reply.update'

]);


Route::resource('/channel', 'ChannelsController');
Route::resource('/discussion', 'DiscussionsController');