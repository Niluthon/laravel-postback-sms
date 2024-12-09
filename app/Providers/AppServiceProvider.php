<?php

namespace App\Providers;

use App\PostbackSms\Contracts\Number\NumberServiceInterface;
use App\PostbackSms\Services\Number\NumberService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->scoped(NumberServiceInterface::class, NumberService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
