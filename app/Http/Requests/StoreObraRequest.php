<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreObraRequest extends FormRequest
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
            'name'=>'required | unique:obras|max:100|min:5',
            'instalacione_id'=>'required',
            'tipobra_id'=>'required',
            'codigo_inversione_id '=>'',
            'importadore_id'=>'',
            'organismo_id'=>'',           
            'valorplan' => 'required',
            'valorhidden' => 'required',
        ];
    }
}
