<?php

namespace erfanwmb\captcha\app\Rules\Captcha\V10;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class RecaptchaValidator implements ValidationRule
{
    protected $google_url='https://www.google.com/recaptcha/api/siteverify';

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        try {
            $data =[
                'secret'        =>  config('captcha.driver.recaptcha.SECURITY_RECAPTCHA_SECRET_KEY'),
                'response'      => $value,
                'remoteip'     => request()->getClientIp()
            ];

            $data = http_build_query($data);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->google_url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_CAINFO, "C:\wamp64\bin\php\php8.2.0\cacert.pem");
            //TODO edit static path cacert here
            $response= curl_exec($ch);
            if (json_decode($response)->success == false) $fail('the :attribute failed');
        }catch (\Exception $exception){
            throw $exception;
        }
    }


    public function message() : string
    {
        return 'The captcha error message' ;
    }
}
