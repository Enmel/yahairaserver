<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
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
            'nacionalidad' => Str::upper($this->nacionalidad),
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
            'nacionalidad' => 'sometimes|in:V,E',
            'cedula' => [
                'sometimes',
                'max:12',
                 Rule::unique('clients')->where(function ($query) {
                     $query->where('cedula', $this->cedula)
                        ->where('nacionalidad', $this->nacionalidad);
                 })
            ],
            'primer_nombre' => 'sometimes|max:255',
            'segundo_nombre' => 'sometimes|max:255',
            'primer_apellido' => 'sometimes|max:255',
            'segundo_apellido' => 'sometimes|max:255',
            'fecha_nacimiento' => 'sometimes|date',
            'email' => 'sometimes|email:filter',
            'phone' => 'sometimes',
        ];
    }
}
