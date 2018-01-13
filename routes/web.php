<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('threads.index');
});

Route::get('/threads/{id}', function ($id) {
    $result = \App\Thread::findOrFail($id);        //Busca o ID das Threads
    return view('threads.view', compact('result'));
});


Route::get('/locale/{locale}', function ($locale){
    session(['locale' => $locale]);
    return back();
});

//Rotas do Socialite
Route::get('/login/{provider}', 'SocialAuthController@redirect');
Route::get('/login/{provider}/callback', 'SocialAuthController@callback');



Route::get('/threads', 'ThreadsController@index');
Route::get('/replies/{id}', 'RepliesController@show');


Route::middleware(['auth'])
    ->group(function (){
        Route::post('/threads', 'ThreadsController@store');
        Route::put('/threads/{thread}', 'ThreadsController@update'); ///threads/{thread} para fazer model binding

        Route::get('/threads/{thread}/edit', function (\App\Thread $thread){
            return view('threads.edit', compact('thread'));
        });

        //Rota para deixar Reply em destaque
        Route::get('/reply/highlight/{id}', 'RepliesController@highlight');
        //Rota para fixar tópico
        Route::get('/threads/pin/{thread}', 'ThreadsController@pin');
        //Rota para fechar tópico
        Route::get('/threads/close/{thread}', 'ThreadsController@close');

        //Rotas Profile
        Route::get('/profile', 'ProfileController@edit');
        Route::post('/profile', 'ProfileController@update');

        Route::post('/replies', 'RepliesController@store');

    });
Auth::routes();
