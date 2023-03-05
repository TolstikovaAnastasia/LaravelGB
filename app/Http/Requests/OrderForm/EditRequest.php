<?php

declare(strict_types=1);

namespace App\Http\Requests\OrderForm;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'user' => ['required', 'string', 'min:5', 'max:200'],
            'phone' => ['required', 'string', 'min:5', 'max:200'],
            'email' => ['required', 'string', 'min:5', 'max:200'],
            'criteria' => ['nullable', 'string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'user' => 'пользователь',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Нужно заполнить поле :attribute',
        ];
    }
}
