<?php

namespace App\Providers;

use App\Services\GameResultService;
use App\Services\LinkService;
use App\Services\UserService;
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
        $this->app->singleton(UserService::class, fn() => new UserService());
        $this->app->singleton(LinkService::class, fn() => new LinkService());
        $this->app->singleton(LinkService::class, fn() => new GameResultService());
    }
}
