<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Grade;
use App\Observers\GradeObserver;
use App\School;
use App\Observers\SchoolObserver;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Grade::observe(GradeObserver::class);
        School::observe(SchoolObserver::class);
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
