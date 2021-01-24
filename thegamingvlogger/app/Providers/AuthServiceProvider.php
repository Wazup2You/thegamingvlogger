<?php

namespace App\Providers;

use App\GameItem;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-item', function (User $user, GameItem $gameItem) {
            return $gameItem->user->is($user);
        });

        Gate::before(function (User $user){
            if ($user->id == 6){// admin
                return true;
            }
        });

//        Gate::before(function ($user, $ability){
//            return $user->abilities()->contains($ability);
//        });
    }
}
