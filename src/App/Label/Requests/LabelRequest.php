<?php

namespace App\Label\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LabelRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'color' => ['required', 'integer', Rule::in([
                'black',
                'blue',
                'brown',
                'gray',
                'green',
                'orange',
                'pink',
                'purple',
                'red',
                'white',
                'yellow',
            ])],
        ];
    }
}
