<?php

namespace erfanwmb\captcha\app\Rules\Captcha\V8;

use Illuminate\Contracts\Validation\Rule;

class HcaptchaValidator implements Rule
{
    protected $h_captcha='https://hcaptcha.com/siteverify';

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {

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
        $data=[
            'secret'        =>  config('captcha.driver.hcaptcha.SECURITY_HCAPTCHA_SECRET_KEY'),
            'response'      => $value
        ];
        $data = http_build_query($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->h_captcha);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_CAINFO, "C:\wamp64\bin\php\php8.2.0\cacert.pem");

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
