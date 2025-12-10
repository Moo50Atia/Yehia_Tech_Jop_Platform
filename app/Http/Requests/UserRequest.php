<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = $this->route('user')?->id;

        $rules = [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'role' => 'required|in:admin,company_owner,jop_seeker',
        ];

        // Password required only on create
        if ($this->isMethod('post')) {
            $rules['password'] = 'required|string|min:8|max:255';
        } else {
            $rules['password'] = 'nullable|string|min:8|max:255';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name is required.',
            'email.required' => 'The email is required.',
            'email.unique' => 'This email is already taken.',
            'password.required' => 'The password is required.',
            'password.min' => 'The password must be at least 8 characters.',
            'role.required' => 'Please select a role.',
            'role.in' => 'Invalid role selected.',
        ];
    }
}
