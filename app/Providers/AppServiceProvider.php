<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->app->singleton('my_school', function () {
            return new \App\MySchool();
        });

        $this->app->singleton('active_intake', function () {
            return optionalLoggedIn()->activeIntake();
        });

        Blade::doubleEncode();

        Carbon::serializeUsing(function ($carbon) {
            return $carbon->format('d/m/Y');
        });

        \DB::listen(function ($query) {
            \Log::info($query->sql, $query->bindings, $query->time);
        });
    }

    /**
     * Register any application services.
     */
    public function register()
    {
    }
}
