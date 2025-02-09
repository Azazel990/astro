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

        Gate::define('my-posts',function(User $user,$post){
            return $user->id === $post->user_id ? Response::allow() : Response::denyWithStatus(401);
        });

        Gate::define('edit-profile',function(User $user,$guest){
            return $user->id === $guest->id ? Response::allow() : Response::denyWithStatus(401);
        });

        Gate::define('is-following',function(User $user,$guest){
            $following = !empty($user->following) ? explode(",",$user->following) : [];
            return in_array($guest->user_id,$following) ? Response::allow() : Response::denyWithStatus(401);
        });
        // Check update user...
    }
}
