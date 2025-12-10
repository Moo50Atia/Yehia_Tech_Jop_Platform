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
            'user_id' => 'required|exists:users,id',
            'job_vacansy_id' => 'required|exists:job_vacansies,id',
            'resume_id' => 'required|exists:resumes,id',
            'company_id' => 'required|exists:companies,id',
            'status' => 'nullable|in:pending,accepted,rejected',
            'aiGeneratedScore' => 'nullable|numeric|min:0|max:100',
            'aiGeneratedFeedback' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Please select an applicant.',
            'user_id.exists' => 'The selected applicant does not exist.',
            'job_vacansy_id.required' => 'Please select a job vacancy.',
            'job_vacansy_id.exists' => 'The selected job vacancy does not exist.',
            'resume_id.required' => 'Please select a resume.',
            'resume_id.exists' => 'The selected resume does not exist.',
            'company_id.required' => 'Please select a company.',
            'company_id.exists' => 'The selected company does not exist.',
            'status.in' => 'Invalid status selected.',
        ];
    }
}
