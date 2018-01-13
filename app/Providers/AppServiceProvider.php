<?php

namespace App\Providers;

use App\Observers\ReplyObserver;
use App\Reply;

use App\Observers\PhotoUserObserver;
use App\User;


use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Injetando o Observer
        //Toda vez que estiver criando, antes de incluir a thread no BD
        Reply::observe(ReplyObserver::class);

        User::observe(PhotoUserObserver::class);
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
