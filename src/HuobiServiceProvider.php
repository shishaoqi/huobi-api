<?php

namespace shishao\huobiApi;

use Illuminate\Support\ServiceProvider;
use shishao\huobiApi\Huobi\HuobiApi;

class HuobiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/config/huobi.php' => config_path('huobi.php'),
            ], 'config-huobi');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton("HuobiApi", function ($app) {
            return new HuobiApi(config('huobi.api_url'), config('huobi.account_id'), config('huobi.access_key'), config('huobi.secret_key'));
        });
    }
}
