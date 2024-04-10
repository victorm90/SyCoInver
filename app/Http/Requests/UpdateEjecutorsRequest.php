<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEjecutorsRequest extends FormRequest
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
            'name'=>'required | unique:entidades|max:100|min:5',
            'telefono'=>'required|string|min:8|max:10|regex:/[0-9]{8}/',
            'addres'=>'string|max:100|min:10|required',
            'provincia_id'=>'required',
            'fecha_cont' => 'required',
            
            'fecha_ven_cont' => 'required',
            'ncontrato' => 'required|integer', 
        ];
    }
}
