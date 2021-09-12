<?php

namespace App\Project\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'estimate_time' => ['nullable', 'integer'],
            'due_at' => ['nullable', 'date'],
            'project_id' => ['nullable', 'integer', 'exists:projects,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }
}
