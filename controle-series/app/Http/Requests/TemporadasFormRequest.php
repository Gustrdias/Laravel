<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TemporadasFormRequest extends FormRequest
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
          'numero' => 'required',
          'imagem' => 'required'
        ];
    }
    public function messages() {
        return [
            'required' => 'O :attribute precisa ser preenchido',
            'unique' => 'Este :attribute já existe em sua lista atual'
        ];
    }
}
