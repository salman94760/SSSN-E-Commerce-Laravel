<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:45',
            'email' => [
            'required',
            'email',
            Rule::unique('users', 'email')
                ->ignore($this->route('user')),
        ],
            'phone' => 'required|digits:10',
            'zipcode' => 'required|digits:6',
            'role' => 'nullable|string',
            
        ];
    }
}