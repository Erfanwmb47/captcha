<?php

namespace erfanwmb\captcha\app\Rules\Captcha\V10;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Session;

class GdValidator implements ValidationRule
{


    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        if (Session::get('g-recaptcha-response') != $value) $fail('the :attribute is not match');
    }
}
