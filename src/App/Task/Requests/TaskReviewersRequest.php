<?php

namespace App\Task\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskReviewersRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'reviewers' => ['required', 'array'],
        ];
    }
}
