<?php

namespace App\Providers;

use App\Http\Responses\OnboardingRegistrationResponse;
use App\Services\UrlShortener\SimpleUrlShortener;
use App\Services\UrlShortener\UrlShortenerInterface;
use Filament\Auth\Http\Responses\Contracts\RegistrationResponse;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(UrlShortenerInterface::class, SimpleUrlShortener::class);
        $this->app->bind(RegistrationResponse::class, OnboardingRegistrationResponse::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
