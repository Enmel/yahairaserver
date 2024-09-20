<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;
use Illuminate\Http\Exceptions\HttpResponseException;
class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->name),
        ]);
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  Validator  $validator
     *
     * @return void
     */
    protected function failedValidation(Validator $validator): void
    {
        $errors = $validator->errors();

        throw new HttpResponseException(response()->json([
            'errors' => $errors
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'name' => 'required|max:255',
            'brand_id' => 'required|exists:App\Models\Brand,id',
            'product_type_id' => 'required|exists:App\Models\ProductType,id',
            'upc' => 'required|max:50',
            'slug' => 'sometimes|max:255',
        ];
    }
}

/*
  'skus.*.sku' => 'sometimes|string|max:255|unique:App\Models\Sku,sku',
            'skus.*.price' => 'sometimes|numeric',
            'skus.*.amount' => 'sometimes|integer|max:9999',
            'skus.*.store_id' => 'sometimes|exists:App\Models\Store,id',
            'skus.*.attributes.*' => 'sometimes|exists:App\Models\AttributeOption,id',
 */
