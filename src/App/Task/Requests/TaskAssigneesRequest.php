<?php

namespace App\Task\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskAssigneesRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'assignees' => ['required', 'array'],
        ];
    }
}
