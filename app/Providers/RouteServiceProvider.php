<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/home';

    public function boot(): void
    {
        $this->routes(function ()
        {
            Route::prefix('/api/v1/')
                ->group(base_path('routes/api/v1/application.php'));

            Route::prefix('/api/v1/')
                ->group(base_path('routes/api/v1/ui.php'));

            Route::prefix('/api/v1/')
                ->group(base_path('routes/api/v1/oauth2.php'));

            Route::prefix('/api/v1/')
                ->group(base_path('routes/api/v1/organization.php'));

            Route::prefix('/api/v1/')
                ->group(base_path('routes/api/v1/idp.php'));

            Route::prefix('/api/v1/')
                ->group(base_path('routes/api/v1/protocol.php'));
        });
    }
}
