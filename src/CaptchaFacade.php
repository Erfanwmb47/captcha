<?php

namespace erfanwmb\captcha;

use Illuminate\Support\Facades\Facade;

class CaptchaFacade extends Facade{
    protected static function getFacadeAccessor()
    {
        return 'eCaptcha';
    }


}
