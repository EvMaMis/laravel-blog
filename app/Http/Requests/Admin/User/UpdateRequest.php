<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => ['required','string','email', Rule::unique('users', 'email')->ignore($this->user->id)],
            'role' => 'required|integer',

        ];
    }

    public function messages(): array {
        return [
            'name.required' => 'Необходимо заполнить имя пользователя',
            'name.string' => 'Поле не соответствует строчному типу данных',
            'email.required' => 'Необходимо добавить адрес электронной почты',
            'email.string' => 'Поле не соответствует строчному типу данных',
            'email.email' => 'Это поле не похоже на электронную почту',
            'email.unique' => 'Эта электронная почта уже используется',
        ];
    }
}
