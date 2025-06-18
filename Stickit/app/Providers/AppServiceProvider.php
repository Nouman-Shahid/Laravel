<?php

namespace App\Providers;

use App\Models\Notes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

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
        Vite::prefetch(concurrency: 3);


        Inertia::share('pendingCount', function () {
            $user = Auth::user();
            return $user ? Notes::where('user_id', '=', $user->id)
                ->where('iscompleted', '=', null)->orderBy('id')->count() : 0;
        });
    }
}
