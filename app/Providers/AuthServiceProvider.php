<?php

namespace App\Providers;
use Gate;
use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

     protected $policies = [
        Post::class => PostPolicy::class,
    ];

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::policy(Post::class, PostPolicy::class);
    }
}
