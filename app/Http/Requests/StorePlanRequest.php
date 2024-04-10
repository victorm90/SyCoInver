<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlanRequest extends FormRequest
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
            'entidad_id' => 'required',
            'instalacion_id' => 'required',
            'obra_id' => 'required ',
            'plan' => 'required|numeric',
            'fecha' => 'required|date',
        ];
    }
}
