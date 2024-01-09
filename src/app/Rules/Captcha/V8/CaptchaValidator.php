<?php

namespace erfanwmb\captcha\app\Rules\Captcha\V8;

use Illuminate\Contracts\Validation\Rule;

class CaptchaValidator implements Rule
{
    private $validationType;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($validationType=null)
    {
        if ($validationType==null) $this->validationType=config('captcha.connection.captcha');
        else $this->validationType=$validationType;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        switch ($this->validationType){
            case 'gd'        : return (new GdValidator)->passes($attribute, $value);
            case 'hcaptcha'  : return (new HcaptchaValidator)->passes($attribute, $value);
            case 'recaptcha' : return (new RecaptchaValidator)->passes($attribute, $value);
            default          : abort(404);
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'The validation error message.';
    }
}
