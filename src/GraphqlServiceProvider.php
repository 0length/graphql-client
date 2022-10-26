<?php

namespace Zerolength\Graphql;

use Illuminate\Support\ServiceProvider;

class GraphqlServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/graphql.php' => config_path('graphql.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind("graphql-client", \Erdinhrmwn\RocketChat\Entities\RocketChat::class);
        $this->app->bind("graphql-query", \Erdinhrmwn\RocketChat\Helper\RocketChat::class);
    }
}