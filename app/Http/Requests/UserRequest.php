<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Actions\Fortify\PasswordValidationRules;

class UserRequest extends FormRequest
{
    use PasswordValidationRules;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => [
                'required',
                'string',
                'email:rfc,dns',
                Rule::unique(User::class),
            ],
            'role' => [
                'required',
                'string',
                Rule::in([
                    // TODO: add the roles constants
                ]),
            ],
        ];
    }
}
