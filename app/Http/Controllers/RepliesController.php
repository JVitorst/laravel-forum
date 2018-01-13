<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReplyRequest;
use App\Reply;
use App\Events\NewReply;


class RepliesController extends Controller
{
    //
    public function show($id){
        $replies = Reply::where('thread_id',$id)
            ->with('user')
            ->get();
        return $replies;
    }

    public function highlight($id){

        $reply = Reply::find($id);

        //Roda a Policy antes de qualquer outra ação
        $this->authorize('update', $reply);


        //Pegar todas as respostas e seta apenas 1 escolhida em destaque
        Reply::where([
            ['id', '!=', $id],
            ['thread_id', '=', $reply->thread_id],
        ])
               ->update([
                    'highlighted' => false
                ]);

             $reply->highlighted = true;
             $reply->save();

             //return $reply;
             return redirect('threads/' . $reply->thread_id);

    }
    public function store(ReplyRequest $request){

        $reply = new Reply;
        $reply->body = $request->input('body');
        $reply->thread_id = $request->input('thread_id');
        $reply->user_id = \Auth::user()->id; //ID do user Autenticado
        $this->authorize('isClosed', $reply);
        //Persistencia
        $reply->save();

        broadcast(new NewReply($reply));

        return response()->json($reply);
    }
}
