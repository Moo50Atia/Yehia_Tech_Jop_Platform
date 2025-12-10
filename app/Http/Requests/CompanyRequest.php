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
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'industry' => 'required|string|max:255',
            'website' => 'nullable|url|max:255',
            'about' => 'nullable|string',
            'owner_id' => 'required|exists:users,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The company name is required.',
            'address.required' => 'The address is required.',
            'industry.required' => 'The industry is required.',
            'website.url' => 'Please enter a valid URL.',
            'owner_id.required' => 'Please select an owner.',
            'owner_id.exists' => 'The selected owner does not exist.',
        ];
    }
}
