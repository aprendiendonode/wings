<?php

namespace App\Time\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'start_at' => ['required', 'datetime'],
            'end_at' => ['required', 'datetime'],
            'task_id' => ['required', 'integer', 'exists:tasks,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }
}
