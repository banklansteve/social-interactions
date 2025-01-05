<?php

namespace YourVendorName\SocialInteractions;

use Illuminate\Support\ServiceProvider;

class SocialInteractionsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/social_interactions.php', 'social_interactions');
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/social_interactions.php' => config_path('social_interactions.php'),
        ], 'config');

        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}
