<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVariantRequest extends FormRequest
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
            'sku' => 'max:50', //ponerle opcional
            'price' => 'required|decimal:2',
            'amount' => 'required|integer|size:10',
            'variants' => 'required|array|gte:1',
            'variants.*.attribute_option_id' => 'required|exists:App\Models\AttributeOptionSkus,id'
        ];
    }
}
