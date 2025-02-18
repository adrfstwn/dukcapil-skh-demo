<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\ViewServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(ViewServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.env') !== 'local') {
        URL::forceScheme('https');
        }
    }
}
