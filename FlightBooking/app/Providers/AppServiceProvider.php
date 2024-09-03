<?php

namespace App\Providers;

use App\Models\bookflight;
use App\Observers\BookFlightObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        bookflight::observe(BookFlightObserver::class);
        Paginator::useTailwind();
    }
}
