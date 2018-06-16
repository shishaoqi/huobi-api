<?php

namespace shishao\huobiApi;

use Illuminate\Support\ServiceProvider;
use shishao\huobiApi\Huobi\HuobiApi;

class HuobiServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

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
            ], 'my-huobi');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerModelFactory();
    }

    /**
     * Register Model ModelFactory.
     *
     * @return void
     */
    protected function registerModelFactory()
    {
        $this->app->singleton(HuobiApi::class, function ($app) {
            return new HuobiApi(config('huobi.api_url'), config('huobi.account_id'), config('huobi.access_key'), config('huobi.secret_key'));
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [HuobiApi::class];
    }
}
