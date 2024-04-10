<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInstalacionesRequest extends FormRequest
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
            'name'=>'required|max:70|min:5| unique:instalaciones|string', 
            'detalle'=>'max:250',
            'municipio_id'=>'required',
            'cadena_id'=>'required'      

            
            

        ];
    }
}
