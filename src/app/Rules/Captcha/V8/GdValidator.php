<?php

namespace erfanwmb\captcha\app\Rules\Captcha\V8;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Session;

class GdValidator implements Rule
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
        return Session::get('g-recaptcha-response') == $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'the :attribute is not match';
    }
}
