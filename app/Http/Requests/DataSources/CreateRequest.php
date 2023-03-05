<?php

declare(strict_types=1);

namespace App\Http\Requests\DataSources;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'source' => ['required', 'string', 'min:5', 'max:200'],
            'url' => ['required', 'string', 'min:5', 'max:200'],
        ];
    }
}