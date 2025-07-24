<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

/**
 * handles the validation for registration requests.
 * @property-read string $name
 * @property-read string $email
 * @property-read string $email_confirmation
 * @property-read string $password
 * @property-read string $password_confirmation
 */


class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'confirmed', 'unique:users,email'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ];
    }

    public function registerCreate()
    {
        $user = User::create($this->validated());
        if (!$user) {
            return false;
        }
        Auth::login($user);
        return $user;
    }
}
