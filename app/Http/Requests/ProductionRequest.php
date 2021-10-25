<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ProjectUpdateRequest
 * @package App\Http\Requests
 */
class ProductionRequest extends FormRequest
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
     * if data send from form-data.
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'products' => json_decode($this->products,true),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'products.*.id' => 'required|exists:products,id',
            'products.*.qty' => 'required',
        ];
    }
}
