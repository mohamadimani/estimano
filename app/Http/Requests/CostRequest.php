<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $validate = [
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'price_unit' =>  ['required', 'string', 'min:2'],

        ];

        switch ($this->method()) {
            case 'GET':
            case 'POST':
            case 'PATCH':
            case 'PUT':
                break;
        }
        return $validate;
    }
}
