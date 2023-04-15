<?php

namespace App\Core\Providers;

use App\Observers\ColorObserver;
use App\Repositories\Models\Color;
use Illuminate\Support\ServiceProvider;

class ModelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Color::observe(ColorObserver::class);
    }
}
