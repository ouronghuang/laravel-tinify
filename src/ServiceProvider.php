<?php

namespace Orh\Laravel\Tinify;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/tinify.php', 'tinify');

        $this->app->singleton('tinify', function () {
            return new Tinify();
        });
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/tinify.php' => config_path('tinify.php'),
            ], 'tinify-config');
        }
    }
}
