<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalcShippingRequest extends FormRequest
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
            'place' => ['integer'],
            'useconfirmedrange' => ['boolean'],
            'types_and_weights' => 'required|array|min:1',
            'types_and_weights.*.weight' => ['integer'],
            'types_and_weights.*.types' => 'array',
            'types_and_weights.*.types.*' => 'string',
            'types_and_weights.*.vweight' => ['integer']
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
