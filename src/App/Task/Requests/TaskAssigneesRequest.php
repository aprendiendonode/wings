<?php

namespace App\Task\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskAssigneesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'assignees' => ['required', 'array', 'exists:users,id'],
        ];
    }
}
