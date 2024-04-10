<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEjecucionesRequest extends FormRequest
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
            'entidade_id'=>'required',
            'instalacione_id'=>'required',            
            'ejecutor_id'=>'required',
            'obra_id'=>'required',
            'gasto_id'=>'required',
            'costototal'=>'required',
            
        ];
    }
}
