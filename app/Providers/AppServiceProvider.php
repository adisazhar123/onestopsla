<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use OneStopSla\Core\Domain\Repositories\ItemsRepositoryInterface;
use OneStopSla\Core\Domain\Repositories\LendsRepositoryInterface;
use OneStopSla\Core\Persistence\Repositories\ItemsRepository;
use OneStopSla\Core\Persistence\Repositories\LendsRepository;

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

        $this->app->bind(
            LendsRepositoryInterface::class,
            LendsRepository::class
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
