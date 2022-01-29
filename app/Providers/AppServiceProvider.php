<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->defineRoutes();
    }

    /**
     * Define the Sanctum routes.
     *
     * @return void
     */
    protected function defineRoutes()
    {
        Route::group(['prefix' => config('project.prefix', 'opensale')], function () {
            Route::get(
                '/meta',
                function () {
                    return json_success([
                        'store_name' => config('project.store-name', 'Open Sale'),
                        'store_description' => config('project.store-description', 'This is short description of your store'),
                        'store_logo' => config('project.store-logo', 'The path to your logo'),
                        'store_address' => config('project.store-address', 'The geo location of your store'),
                    ]);
                }
            )->middleware('web');
        });
    }
}
