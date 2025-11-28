<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|max:255',
            'email' => 'string|max:255|unique:users,email',
            'email_verified_at' => 'date',
            'password' => 'string|max:255',
            'role' => 'in:admin,company_owner,jop_seeker',
            'remember_token' => 'string|max:100',
            'deleted_at' => 'date',
        ];
    }
}
