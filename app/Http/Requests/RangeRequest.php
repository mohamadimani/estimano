<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RangeRequest extends FormRequest
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
            'types' => 'array',
            'types.*' => 'string',
            'priority'  => 'required|numeric|min:1',
            'colleague' => 'string|nullable',
            'items' => 'required|array|min:1',
            'items.*.endRange' => ['required'],
            'items.*.fixed' => ['required', 'numeric'],
            'items.*.perKilo' => ['required', 'numeric'],
            'items.*.roundingWeight' => ['required','numeric'],
            'items.*.fixedNonAccumulative' => ['required' , 'numeric'],
            'items.*.perKiloNonAccumulative' =>   ['required', 'numeric']
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
