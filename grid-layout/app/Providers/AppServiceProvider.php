<?php

namespace App\Providers;

use App\Helpers\ExternalApiHelper;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->singleton(ExternalApiHelper::class, function() {
            return new ExternalApiHelper();
        });
    }
}
