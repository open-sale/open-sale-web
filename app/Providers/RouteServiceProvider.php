<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        $active_api_version = config('project.active-api-version', 'v1');

        Route::prefix('api' . '/' . $active_api_version)
             ->middleware('api')
             ->group(base_path('routes/api_' . $active_api_version .'.php'));

        Route::prefix('api' . '/' . $active_api_version)
             ->middleware('api')
             ->group(function () {
                return $this->mapFallbackRoute();
             });
    }

    /**
     * Define the "fallback" route for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapFallbackRoute()
    {
        Route::fallback(function(){
            return response()->json(
                ['message' => 'Hm, why did you land here somehow!'],
                Response::HTTP_NOT_FOUND
            );
        })->name('api.fallback.404');
    }
}
