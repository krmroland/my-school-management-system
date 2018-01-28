<?php

namespace App\Providers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        Request::macro('isUpdating', function () {
            return in_array($this->method(), ['PUT', 'PATCH']);
        });
        Request::macro('isDeleting', function () {
            return 'DELETE' == $this->method();
        });
        Request::macro('isCreating', function () {
            return 'POST' == $this->method();
        });
        Request::macro('uniqueRule', function ($modal) {
            $rule = Rule::unique();
        });
        Blueprint::macro('indexedInteger', function ($column) {
            return $this->integer($column)->unsigned()->index();
        });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
