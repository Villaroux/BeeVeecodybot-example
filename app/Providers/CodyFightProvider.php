<?php

namespace App\Providers;

use App\Responses\CodyFightResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class CodyFightProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //TODO:: remove this
        /* $this->app->scoped(CodyFightResponse::class, function ($app) {
            // Assuming you have a way to obtain or generate the Collection
            return new CodyFightResponse();
        }); */
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //ADD custom routes
        $this->routes(function () {
            Route::middleware('api')->group(base_path('routes/codyfight.php'));
        });
    }
}
