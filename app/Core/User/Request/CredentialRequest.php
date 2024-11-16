<?php

namespace App\Core\User\Request;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CredentialRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
            'remember' => 'required|boolean',
        ];
    }

    /**
     * @return string
     */
    public function email(): string
    {
        return $this->string('email');
    }

    /**
     * @return string
     */
    public function password(): string
    {
        return $this->string('password');
    }

    /**
     * @return string
     */
    public function remember(): string
    {
        return $this->string('remember');
    }
}
