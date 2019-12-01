<?php

namespace Shuvo\Errorlog;

use Illuminate\Support\ServiceProvider;

class ErrorlogServiceProvider extends ServiceProvider{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__."/routes/web.php");
        $this->loadViewsFrom(__DIR__."/Views", "errorlog");
        $this->loadMIgrationsFrom(__DIR__."/database/migrations");
        $this->mergeConfigFrom(
            __DIR__.'/config/errorMail.php', 'errorlog'
        );

        //Publish
        $this->publishes([
            __DIR__.'/database/migrations/' => database_path("migrations"),
            __DIR__.'/views' => resource_path("views/vendor/contact"),
            __DIR__.'/config/errorMail.php' => config_path("errorMail.php")
        ]);

    }

    public function register()
    {

    }
}
