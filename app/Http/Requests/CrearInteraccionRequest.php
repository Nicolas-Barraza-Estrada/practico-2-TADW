<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearInteraccionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'perro_interesado_id' => 'required|exists:perros,id',
            'perro_candidato_id' => 'required|exists:perros,id',
            'preferencia' => 'required|in:aceptado,rechazado',
        ];
    }
}
