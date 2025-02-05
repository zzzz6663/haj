<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->usePublicPath(__DIR__.'/../../public_html');

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
