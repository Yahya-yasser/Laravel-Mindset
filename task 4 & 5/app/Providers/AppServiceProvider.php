<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        //
        // Gate::define('users-view', function (User $user) {
        //     $user->hasPermissionTo('users-view');
        // });
        Gate::define('users-view', [UserPolicy::class, 'view']);
        // Gate::define('users-create', function (User $user) {
        //     $user->hasRole('users');
        // });

         Gate::define('update-settings', [UserPolicy::class, 'updateSettings']);
    }
}
