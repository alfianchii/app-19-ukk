<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;

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
        // Pagination
        Paginator::defaultView('vendor.pagination.tailwind');
        Paginator::defaultSimpleView('vendor.pagination.simple-tailwind');

        // Gates
        Gate::define(
            "admin",
            fn (User $user) =>
            $user->role == "admin"
        );

        Gate::define(
            "officer",
            fn (User $user) =>
            $user->role == "officer"
        );

        Gate::define(
            "reader",
            fn (User $user) =>
            $user->role == "reader"
        );

        if(env('APP_ENV') !== 'local') URL::forceScheme('https');
    }
}