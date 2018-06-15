<?php namespace PYS\LolApi\Laravel;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use PYS\LolApi\Api;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config.php' => config_path('lol-api.php'),
        ]);
    }

    public function register()
    {
        $this->app->singleton(
            Api::class,
            function () {
                return new Api(config('lol-api.api_key'));
            }
        );
        $this->app->alias(Api::class, 'lol-api');
    }
}
