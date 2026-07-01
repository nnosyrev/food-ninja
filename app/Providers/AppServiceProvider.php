<?php

namespace App\Providers;

use App\Services\UrlShortener\SimpleUrlShortener;
use App\Services\UrlShortener\UrlShortenerInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(UrlShortenerInterface::class, SimpleUrlShortener::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
