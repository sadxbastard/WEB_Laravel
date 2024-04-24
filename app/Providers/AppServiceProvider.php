<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Type_of_activity;


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
        Paginator::defaultView('pagination::default');

        Gate::define('destroy-type_of_activity', function(User $user, Type_of_activity $type_of_activity){
            return $user->id == $type_of_activity->user_id;
        });
        Gate::define('edit-type_of_activity', function(User $user, Type_of_activity $type_of_activity){
            return $user->id == $type_of_activity->user_id;
        });
    }
}
