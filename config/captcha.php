<?php
return [


    /*
|--------------------------------------------------------------------------
| captcha Connections
|--------------------------------------------------------------------------
|
|   Here you can choose what captcha you want
|   hcaptcha    (put your site key & secret key)
|   recaptcha   (put your site key & secret key)
|   gd
*/
    'connection'=>[
        'url'                           =>env('APP_URL'),
        'captcha'                       =>env('SECURITY_CAPTCHA','gd')
    ],

    'driver'=>[
        'recaptcha'=>[
            'SECURITY_RECAPTCHA_SITE_KEY'       =>  env('SECURITY_RECAPTCHA_SITE_KEY'),
            'SECURITY_RECAPTCHA_SECRET_KEY'     =>  env('SECURITY_RECAPTCHA_SECRET_KEY'),

        ],

        'hcaptcha'=>[
            'SECURITY_HCAPTCHA_SITE_KEY'       =>  env('SECURITY_HCAPTCHA_SITE_KEY'),
            'SECURITY_HCAPTCHA_SECRET_KEY'     =>  env('SECURITY_HCAPTCHA_SECRET_KEY'),
        ],

        'gd'=>[

        ],
    ],



];
