<?php

namespace App\Providers;

use App\MySchool;
use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->app->singleton('my_school', function () {
            return new MySchool();
        });

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
