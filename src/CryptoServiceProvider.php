<?php

namespace IesCrm\Crypto;

use Illuminate\Support\ServiceProvider;

class CryptoServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/crypto.php', 'crypto');
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/crypto.php' => config_path('crypto.php'),
        ], 'crypto-config');

        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations'),
        ], 'crypto-migrations');

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}

