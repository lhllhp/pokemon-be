<?php

namespace App\Providers;

use App\Library\Services\BigQueryService;
use App\Library\Services\Contracts\GoogleServiceInterface;
use Illuminate\Support\ServiceProvider;

class BigQueryProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register() : void
    {
        $this->app->bind(GoogleServiceInterface::class, BigQueryService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
