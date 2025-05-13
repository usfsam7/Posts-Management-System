<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Gate::define('create-post', function (User $user)
        // {
        //     return $user->type == 'author';
        // });


        // Gate::define('admin-control', function (User $user)
        // {
        //     return $user->type == 'admin';
        // });


        // Gate::define('update-post', function (User $user, Post $post)
        // {
        //     return $user->id == $post->user_id;
        // });
    }





    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        
    }
}
