<?php

namespace App\Providers;

use App\Library\Services\BigQueryService;
use App\Library\Services\Contracts\GoogleServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register() : void
    {
        $this->app->register(BigQueryProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
