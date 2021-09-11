<?php

namespace App\Time\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'start_at' => ['required', 'datetime'],
            'end_at' => ['required', 'datetime'],
            'task_id' => ['required', 'integer', 'exists:tasks'],
        ];
    }
}
