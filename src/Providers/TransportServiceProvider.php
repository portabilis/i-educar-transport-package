<?php

namespace iEducar\Packages\Transport\Providers;

use App\Http\Controllers\LegacyController;
use Illuminate\Support\ServiceProvider;

class TransportServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        }

        LegacyController::resolver(function ($uri) {
            if (in_array($uri, static::intranet())) {
                return __DIR__ . '/../../ieducar/' . $uri;
            }

            return null;
        });

        LegacyController::resolver(function ($uri) {
            if (in_array($uri, static::module())) {
                return __DIR__ . '/../../ieducar/modules';
            }

            return null;
        });
    }

    public static function module(): array
    {
        return [
            //
        ];
    }

    public static function intranet(): array
    {
        return [
            //
        ];
    }
}
