<?php

namespace Armory\Autocomplete\Laravel;

use Armory\Autocomplete\Autocomplete;
use Armory\Autocomplete\Laravel\RepositoryManager;
use Illuminate\Support\ServiceProvider;

class AutocompleteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'../config/autocomplete.php' => config_path('autocomplete.php'),
        ]);
    }

    public function register()
    {
        $this->app->bind('autocomplete.factory', function($app)
        {
            return new RepositoryManager($app);
        });

        $this->app->singleton('autocomplete', function($app)
        {
            return new Autocomplete($app['autocomplete.factory']->driver());
        });
    }
}
