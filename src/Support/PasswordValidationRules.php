<?php

namespace Support;

use Illuminate\Validation\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array
     */
    protected function passwordRules()
    {
        return [
            'required',
            'string',
            'confirmed',
            (new Password(8))
                ->letters()
                ->numbers()
                ->mixedCase()
                ->symbols()
                ->uncompromised(),
        ];
    }
}
