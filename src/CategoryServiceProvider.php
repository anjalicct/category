<?php

namespace Anjalicct\Category;

use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/category.php');

        $this->loadViewsFrom(__DIR__.'/views', 'category');

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');


        $this->publishes([__DIR__.'/./../routes/category.php' => resource_path('routes/category.php'),
        ], 'routes');

        $this->publishes([
            __DIR__.'/./../views' => resource_path('views/categorypkg/'),
        ],'views');

        $this->publishes([__DIR__.'/database/migrations' => 'database/migrations/'], 'migration');

        $this->publishes([__DIR__.'/controllers' => 'app/http/controllers/',
        ], 'controller');

        $this->publishes([__DIR__.'/models' => 'app/Models/',
        ], 'models');
    }
}
