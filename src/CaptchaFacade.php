<?php

namespace erfanwmb\captcha;

use Illuminate\Support\Facades\Facade;
use erfanwmb\captcha\app\Rules\Captcha\V8\CaptchaValidator as CaptchaValidator8;
use erfanwmb\captcha\app\Rules\Captcha\V10\CaptchaValidator as CaptchaValidator10;
use Illuminate\Support\Facades\Redirect;


class CaptchaFacade extends Facade{

    public function __construct()
    {

    }

    protected static function getFacadeAccessor()
    {
        return 'eCaptcha';
    }

    public static function validate(string $exclusive_captcha=null)
    {
        $config=config('captcha.connection.captcha');
        //TODO validation required here
        if (is_null($config)) return true;
        $laravel_version=explode('.',app()::VERSION)[0];
        switch ($laravel_version){
            case 8 :
            case 9 : return new CaptchaValidator8($exclusive_captcha);
            case 10 : return new CaptchaValidator10($exclusive_captcha);
        }
    }

}
