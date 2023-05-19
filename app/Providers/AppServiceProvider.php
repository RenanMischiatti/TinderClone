<?php

namespace App\Providers;

use App\Models\Matchs;
use App\Observers\MatchObserver;
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
        Matchs::observe(MatchObserver::class);
    }
}
