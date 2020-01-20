<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|string|max:150',
            'matricula' => 'required|max:10',
            'tarjeta' => 'required|max:20',
            'grado' => 'required',
            'grupo' => 'required',
            'tutor' => 'required'
        ];
    }
}
