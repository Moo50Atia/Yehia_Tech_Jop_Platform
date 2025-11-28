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
            'title' => 'string|max:255',
            'description' => 'string',
            'location' => 'string|max:255',
            'type' => 'in:full-time,remote,contract,part-time',
            'salary' => 'numeric',
            'company_id' => 'string|max:36',
            'job_category_id' => 'string|max:36',
            'deleted_at' => 'date',
        ];
    }
}
