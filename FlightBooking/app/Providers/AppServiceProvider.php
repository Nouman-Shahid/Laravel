<?php

namespace App\Providers;

use App\Http\Middleware\Admin;
use App\Models\bookflight;
use App\Http\Middleware\ValidUser;
use Illuminate\Pagination\Paginator;
use App\Observers\BookFlightObserver;
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
        bookflight::observe(BookFlightObserver::class);
        Paginator::useTailwind();
    }
}
