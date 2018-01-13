<?php

namespace App\Policies;

use App\Reply;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReplyPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function update(User $user, Reply $reply){
        return $user->role === 'admin';
    }
    public function isClosed(User $user, Reply $reply){
        //Verifica se Thread a que o user se refere esta fechada ou não
        return !$reply->thread->closed;
    }
}
