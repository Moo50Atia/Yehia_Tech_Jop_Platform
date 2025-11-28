<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|max:255',
            'address' => 'string',
            'industry' => 'string|max:255',
            'website' => 'string|max:255',
            'owner_id' => 'string|max:36',
            'deleted_at' => 'date',
        ];
    }
}
