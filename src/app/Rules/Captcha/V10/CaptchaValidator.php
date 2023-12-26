<?php

namespace erfanwmb\captcha\app\Rules\Captcha\V10;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CaptchaValidator implements ValidationRule
{
    private $validationType;

    public function __construct($validationType=null)
    {
        if ($validationType==null) $this->validationType=config('captcha.connection.captcha');
        else $this->validationType=$validationType;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        switch ($this->validationType){
            case 'gd'        : $validtor = new GdValidator();        $validtor->validate($attribute,$value,$fail);
                break;
            case 'hcaptcha'  : $validtor = new HcaptchaValidator();        $validtor->validate($attribute,$value,$fail);
                break;
            case 'recaptcha' : $validtor = new RecaptchaValidator();        $validtor->validate($attribute,$value,$fail);
                break;
            default          : $fail('the :attribute failed,make sure your config is correct or you call right validation');
        }
    }
}
