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
            case 'gd'        : $validtor = new GdValidator();
                break;
            case 'hcaptcha'  : $validtor = new HcaptchaValidator($value);
                break;
            case 'recaptcha' : $validtor = new RecaptchaValidator($value);
                break;
            default          : abort(404);
        }
        $validtor->validate($attribute,$value);
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
