<?php

namespace ARJUN\ADMIN\RULES;

use Illuminate\Contracts\Validation\Rule;
use ReCaptcha\ReCaptcha;

class CAPTCHARULES implements Rule {

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value) {
        $captcha = new ReCaptcha("6Lcd-IUUAAAAAJ6cIGBVp_6gTJ2d1IrLIZK-qmTc");
        $response = $captcha->verify($value, $_SERVER['REMOTE_ADDR']);
        return $response->isSuccess();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() {
        return 'The validation error message.';
    }

    protected function validator(array $data) {
        return Validator::make($data, [
                    'email' => 'required|string|email',
                    'password' => 'required',
                    'g-recaptcha-response' => 'required'
        ]);
    }

}
