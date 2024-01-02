<?php

namespace erfanwmb\captcha;

use Illuminate\Support\ServiceProvider;
use erfanwmb\captcha\captcha;

class CaptchaServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('captcha',function (){
            return new captcha;
        });


        $this->mergeConfigFrom(__DIR__.'\\..\\config\captcha.php','captcha');
    }

    public function boot()
    {


        $this->loadViewsFrom(__DIR__.'\\..\\resources\view','captcha');

        $this->publishes([
            __DIR__.'\\..\\config\captcha.php' => config_path('captcha.php'),
        ],'config');

        $this->publishes([
            __DIR__ . '\\..\\resources/view' => base_path('resources/views/captcha'),
        ],'captcha-views');


    }
}
