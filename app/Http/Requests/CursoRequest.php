<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=> 'required|string|min:5',
            'description' => 'required|string|min:15'
        ];
    }

    public function messages() {
        return [
            'name.required'=>'Campo nome é obrigatório',
            'name.min'=> 'Campo nome precisa conter mais de :min caracteres',
            'description.required'=> 'A descrição da eletiva é obrigatória',
            'description.min'=> 'A descrição da eletiva precisa conter mais de :min caracteres',
        ];
    }
}
