<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobVacansyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'note' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'type' => 'required|in:full-time,remote,contract,part-time',
            'salary' => 'nullable|numeric|min:0',
            'status' => 'nullable|in:active,pending,rejected',
            'company_id' => 'nullable|exists:companies,id',
            'job_category_id' => 'nullable|exists:jop_categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The job title is required.',
            'description.required' => 'The job description is required.',
            'type.required' => 'Please select a job type.',
            'type.in' => 'Invalid job type selected.',
            'company_id.required' => 'Please select a company.',
            'company_id.exists' => 'The selected company does not exist.',
            'job_category_id.exists' => 'The selected category does not exist.',
        ];
    }
}
