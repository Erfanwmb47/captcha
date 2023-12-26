<?php

namespace erfanwmb\captcha\app\Rules\Captcha\V8;

use Illuminate\Contracts\Validation\Rule;

class RecaptchaValidator implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value) : bool
    {
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
            return json_decode($response)->success == true;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
