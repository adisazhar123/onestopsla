<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use OneStopSla\Core\Domain\Repositories\ItemsRepositoryInterface;
use OneStopSla\Core\Persistence\Repositories\ItemsRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ItemsRepositoryInterface::class,
            ItemsRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
