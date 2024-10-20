<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Widget;
use App\Observers\WidgetObserver;

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
        Widget::observe(WidgetObserver::class);
    }
}
