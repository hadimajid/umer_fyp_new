<?php

namespace App\Providers;

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
//        if($_SERVER['HTTP_HOST']=="hopee.online") {
            $this->app->bind('path.public', function () {
                return realpath(base_path() . '/../public_html');
            });
//        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
