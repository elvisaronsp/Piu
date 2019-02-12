<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Grade;
use App\Observers\GradeObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Grade::observe(GradeObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
