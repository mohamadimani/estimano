<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingRequest extends FormRequest
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
            'origin_city' =>  ['required', 'integer', 'min:4'],
            'origin_country' =>  ['required', 'string', 'min:2'],
            'destination_city' =>   ['required', 'integer', 'min:4'],
            'destination_country' =>   ['required', 'string', 'min:2'],
            'transport_type' =>   ['required', 'string', 'min:1'],
            'included_all_city' =>   ['required', 'boolean'],
            'is_special' =>   ['required', 'boolean'],
            'cost_id' =>   ['required', 'integer'],
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

    /**
     * Prepare inputs for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        switch ($this->method()) {
            case 'GET':
            case 'POST':
                $this->merge([
                    'included_all_city' => $this->toBoolean($this->included_all_city),
                    'is_special' => $this->toBoolean($this->is_special),
                ]);
            case 'PATCH':
            case 'PUT':
                break;
        }
    }

    /**
     * Convert to boolean
     *
     * @param $booleable
     * @return boolean
     */
    private function toBoolean($booleable)
    {
        return filter_var($booleable, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    }
}
