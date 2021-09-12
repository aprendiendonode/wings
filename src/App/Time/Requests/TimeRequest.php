<?php

namespace App\Time\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'start_at' => ['required', 'date'],
            'end_at' => ['required', 'date'],
            'task_id' => ['required', 'integer', 'exists:tasks,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }
}
