<?php

namespace packages\captcha\app\Rules\Captcha;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Validator;

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
            case 'gd'        : $validtor = new GdValidator();
                break;
            case 'hcaptcha'  : $validtor = new HcaptchaValidator($value);
                break;
            case 'recaptcha' : $validtor = new RecaptchaValidator($value);
                break;
            default          : abort(404);
        }
        $validtor->validate($attribute,$value,$fail);



    }
}
