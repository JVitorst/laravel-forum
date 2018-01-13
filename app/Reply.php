<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['highlighted'];

    public function user(){
        // Um usuarios tem mtdss replies, ams cada reply tem apenas um user
        return $this->belongsTo(\App\User::class);
    }
    function thread(){

        return $this->belongsTo(\App\Thread::class);
    }
}
