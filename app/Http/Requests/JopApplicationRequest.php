<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JopApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'string|max:36',
            'job_vacansy_id' => 'string|max:36',
            'resume_id' => 'string|max:36',
            'company_id' => 'string|max:36',
            'status' => 'in:pending,accepted,rejected',
            'aiGeneratedScore' => 'numeric',
            'aiGeneratedFeedback' => 'string',
            'deleted_at' => 'date',
        ];
    }
}
