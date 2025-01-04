<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use App\Models\Posts_Model;
use App\Models\User;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('view-post', function (User $user,$post) {
            return $user->id === $post->user_id ? Response::allow() : Response::denyWithStatus(401);
        });

        // Check update user...
        Gate::define("check-update-user",function(User $user,$post){
            return $user->id === $post->user_id ? Response::allow() : Response::denyWithStatus(401);
        });
        // Check update user...
    }
}
