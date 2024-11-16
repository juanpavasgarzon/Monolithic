<?php

namespace App\Core\User\Request;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8|same:password',
        ];
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->string('name');
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
}
