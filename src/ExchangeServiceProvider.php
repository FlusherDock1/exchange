<?php

declare(strict_types=1);

namespace Jurager\Exchange;

use Jurager\Exchange1C\Config;
use Jurager\Exchange1C\Interfaces\EventDispatcherInterface;
use Jurager\Exchange1C\Interfaces\ModelBuilderInterface;
use Jurager\Exchange1C\ModelBuilder;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;

/**
 * Class ExchangeServiceProvider.
 */
class ExchangeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        // routes
        $this->loadRoutesFrom(__DIR__.'/../publish/routes.php');

        // config
        $this->publishes([__DIR__.'/../publish/config/' => config_path()], 'config');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton(Config::class, function ($app) {
            return new Config($app['config']['exchange']);
        });

        $this->app->singleton(EventDispatcherInterface::class, function ($app) {
            $laravelDispatcher = $app[Dispatcher::class];

            return new LaravelEventDispatcher($laravelDispatcher);
        });

        $this->app->singleton(ModelBuilderInterface::class, function ($app) {
            return $app[ModelBuilder::class];
        });
    }
}
