<?php

namespace App\Project\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectMembersRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'members' => ['required', 'array'],
        ];
    }
}
