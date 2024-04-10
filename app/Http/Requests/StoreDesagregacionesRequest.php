<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDesagregacionesRequest extends FormRequest
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
            'fecha'=>'required',
            'costoMN'=>'required',
            'costoUSD'=>'required',
            'instalacione_id'=>'required',
            'ejecutor_id'=>'required',            
            'servicio_id'=>'required',            
        ];
    }
}
