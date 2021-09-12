<?php

namespace App\Task\Requests;

use Domain\Task\States\Open;
use Domain\Task\States\Closed;
use Illuminate\Validation\Rule;
use Domain\Task\States\Reviewed;
use Domain\Task\States\InProgress;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'status' => ['required', 'int', Rule::in([
                Open::CODE,
                InProgress::CODE,
                Reviewed::CODE,
                Closed::CODE,
            ])],
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'project_id' => ['required', 'integer', 'exists:projects,id'],
        ];
    }
}
