<?php

namespace App\Http\Requests;

use App\DTO\RegisterDTO;
use Illuminate\Foundation\Http\FormRequest;

class RegisterForm extends FormRequest
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
            'username' => ['required', 'string', 'max:64'],
            'phone_number' => ['required', 'string', 'max:16'],
        ];
    }

    public function getDto(): RegisterDTO
    {
        return new RegisterDTO(
            $this['username'],
            $this['phone_number'],
        );
    }
}
